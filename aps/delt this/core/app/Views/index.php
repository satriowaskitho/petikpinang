<!DOCTYPE html>
<!-- Coding by CodingNepal || www.codingnepalweb.com -->
<html lang="en">

<head>
  <title><?= $title; ?></title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Boxicons CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link flex href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?= base_url('/CSS/style.css') ?>" />
  <link rel="icon" type="image/x-icon" href="<?= base_url('/IMG/logo.png') ?>">
</head>

<body>
  <div class="container text-center">
    <div class="judulList">
      <?php if (session()->get('admin')) { ?>
        <p class="h1 judul">Admin</p>
      <?php }; ?>
      <p class="h1 judul">PUSTAKA</p>
      <!-- Admin -->
      <?php if (session()->get('admin')) { ?>
        <button type="button" class="bi bi-plus-circle-fill iconList" data-bs-toggle="modal" data-bs-target="#BukuBuatModal"> </button>
        <button type="button" class="bi bi-door-closed-fill iconList" data-bs-toggle="modal" data-bs-target="#LogoutModal"></button>
      <?php }; ?>

    </div>

    <div class="main">
      <form action="" method="get">
        <div class="input-group mb-3" style="background-color: transparent;">
          <input name="keyword" type="text" class="form-control cari shadow-none" placeholder="judul buku..." aria-label="Recipient's username" aria-describedby="button-addon2">
          <button class="btnModal putih" type="submit" id="button-addon2">Cari</button>
        </div>
      </form>
      <div>
        <table class="tabel">
          <thead class="fs-4 text-white">
            <tr>
              <th>ID-Publikasi</th>
              <th>Judul Publikasi</th>
              <th>Hardcopy</th>
              <th>Softcopy</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody class="fs-4 text-white">
            <?php foreach ($buku as $b) : ?>
              <tr>
                <td><?= $b['id_publikasi']; ?></td>
                <td class="text-start"><?= $b['judul']; ?></td>
                <td><?= $b['hardcopy']; ?></td>
                <td><?= $b['softcopy']; ?></td>
                <td>
                  <div style="overflow: visible;" class="btn-group">
                    <button style="width: 50px;" type="button" class="dropdown-toggle btnModal lihat" data-bs-toggle="dropdown" aria-expanded="false">
                      A
                    </button>
                    <ul class="dropdown-menu">
                      <?php if ($b['hardcopy'] != 0 || $b['softcopy'] != 0) { ?>
                        <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#lihatModal<?= $b['id']; ?>">Lihat</button></li>
                      <?php }; ?>
                      <?php if (session()->get('admin')) { ?>
                        <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#VersiBuatModal<?= $b['id']; ?>">Tambah</button></li>
                        <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#editModal<?= $b['id']; ?>">Edit</button></li>
                        <li>
                          <hr class="dropdown-divider">
                        </li>
                        <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $b['id']; ?>">Hapus</button></li>
                      <?php }; ?>

                    </ul>
                  </div>
                </td>
              </tr>

            <?php endforeach; ?>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="3">Halaman</td>
              <td colspan="2"><?= $pagerBuku->links() ?></td>
            </tr>
          </tfoot>
        </table>
      </div>

      <?php foreach ($buku as $b) : ?>
        <div class="modal fade" id="lihatModal<?= $b['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="lihatModalLabel<?= $b['id']; ?>" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="lihatModalLabel<?= $b['id']; ?>"><?= $b['judul']; ?>&nbsp&nbsp&nbsp|</h1>
                <h1 class="modal-title fs-5" id="lihatModalLabel<?= $b['id']; ?>">&nbsp&nbsp&nbsp<?= $b['id_publikasi']; ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body" style="overflow: auto; white-space: nowrap;">
                <table class="tabel-modal">
                  <thead>
                    <tr class="th-modal">
                      <?php if (session()->get('admin')) { ?>
                        <th>Aksi</th>
                      <?php }; ?>
                      <th>Versi</th>
                      <th>Bulan</th>
                      <th>Tahun</th>
                      <th>Penerbit</th>
                      <th>Ruang</th>
                      <th>Lorong</th>
                      <th>RAK</th>
                      <th>Hardcopy</th>
                      <th>Softcopy</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($versi as $v) : ?>
                      <?php if ($v['id_buku'] == $b['id']) { ?>
                        <tr class="td-modal">
                          <?php if (session()->get('admin')) { ?>
                            <td>
                              <button style="width: 50px;" class="btnModal biru" type="button" data-bs-toggle="modal" data-bs-target="#VersiEditModal<?= $v['id']; ?>"><i class="bi bi-pen-fill"></i></button>
                              <button style="width: 50px;" class="btnModal merah" type="button" data-bs-toggle="modal" data-bs-target="#hapusVersiModal<?= $v['id']; ?>"><i class="bi bi-trash-fill"></i></button>
                            </td>
                          <?php }; ?>
                          <td><?= $v['versi']; ?></td>
                          <td><?= $v['bulan']; ?></td>
                          <td><?= $v['tahun']; ?></td>
                          <td><?= $v['penerbit']; ?></td>
                          <td><?= $v['ruang']; ?></td>
                          <td><?= $v['lorong']; ?></td>
                          <td><?= $v['rak']; ?></td>
                          <td><?= $v['hardcopy']; ?></td>
                          <td><?= $v['softcopy']; ?></td>
                        </tr>
                      <?php }; ?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <div class=" modal-footer">
                <button type="button" class="btnModal lihat" data-bs-dismiss="modal">Tutup</button>
              </div>
            </div>
          </div>
        </div>
        <?php foreach ($versi as $v) : ?>
          <?php if ($v['id_buku'] == $b['id']) { ?>
            <div class="modal fade" id="hapusVersiModal<?= $v['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusVersiModalLabel<?= $v['id']; ?>" aria-hidden="true">
              <div style="width: 20%;" class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-center">
                  <h1 class="modal-title fs-5 text-center" id="hapusVersiModalLabel<?= $v['id']; ?>">Hapus <?= $v['versi']; ?> ?</h1>
                  <div class="modal-footer" style="display: flex;   justify-content: center;">
                    <form action="<?= base_url('/Versi/hapus/'); ?><?= $v['id']; ?>" method="post">
                      <?= csrf_field(); ?>
                      <input type="hidden" name="_method" value="DELETE">
                      <button class="btnModal biru">Ya</button>
                      <button type="button" class="btnModal merah" data-bs-dismiss="modal">Tidak</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal fade" id="VersiEditModal<?= $v['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="VersiEditModalLabel<?= $v['id']; ?>" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="VersiEditModalLabel<?= $v['id']; ?>">Edit <?= $v['versi']; ?> ?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="<?= base_url('/Versi/edit/'); ?><?= $v['id']; ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class=" modal-body">
                      <div class=" mb-3">
                        <input type="text" class="form-control" id="versi" placeholder="Versi" name="versi" value="<?= $v['versi']; ?>" required />
                      </div>
                      <div class="mb-3">
                        <input type="text" class="form-control" id="penerbit" placeholder="Penerbit" name="penerbit" value="<?= $v['penerbit']; ?>" required />
                      </div>
                      <select name="bulan" id="bulan" class="form-select mb-3" aria-label="Default select example" required>
                        <option value="Januari" <?php if ($v['bulan'] == 'Januari') {
                                                  echo ' selected="selected"';
                                                } ?>>Januari</option>
                        <option value="Februari" <?php if ($v['bulan'] == 'Februari') {
                                                    echo ' selected="selected"';
                                                  } ?>>Februari</option>
                        <option value="Maret" <?php if ($v['bulan'] == 'Maret') {
                                                echo ' selected="selected"';
                                              } ?>>Maret</option>
                        <option value="April" <?php if ($v['bulan'] == 'April') {
                                                echo ' selected="selected"';
                                              } ?>>April</option>
                        <option value="Mei" <?php if ($v['bulan'] == 'Mei') {
                                              echo ' selected="selected"';
                                            } ?>>Mei</option>
                        <option value="Juni" <?php if ($v['bulan'] == 'Juni') {
                                                echo ' selected="selected"';
                                              } ?>>Juni</option>
                        <option value="Juli" <?php if ($v['bulan'] == 'Juli') {
                                                echo ' selected="selected"';
                                              } ?>>Juli</option>
                        <option value="Agustus" <?php if ($v['bulan'] == 'Agustus') {
                                                  echo ' selected="selected"';
                                                } ?>>Agustus</option>
                        <option value="September" <?php if ($v['bulan'] == 'September') {
                                                    echo ' selected="selected"';
                                                  } ?>>September</option>
                        <option value="Oktober" <?php if ($v['bulan'] == 'Oktober') {
                                                  echo ' selected="selected"';
                                                } ?>>Oktober</option>
                        <option value="November" <?php if ($v['bulan'] == 'November') {
                                                    echo ' selected="selected"';
                                                  } ?>>November</option>
                        <option value="Desember" <?php if ($v['bulan'] == 'Desember') {
                                                    echo ' selected="selected"';
                                                  } ?>>Desember</option>
                      </select>
                      <div class="mb-3">
                        <label for="tahun">Tahun:</label>
                        <input class="tahun" type="number" id="tahun" name="tahun" min="1900" max="2050" value="<?= $v['tahun']; ?>" required>
                      </div>
                      <div class="mb-3">
                        <label for="ruang">Ruang:</label>
                        <input class="tahun" type="number" id="ruang" name="ruang" min="1" max="100" value="<?= $v['ruang']; ?>" required>
                        <label for="lorong">Lorong:</label>
                        <input class="tahun" type="number" id="lorong" name="lorong" min="1" max="100" value="<?= $v['lorong']; ?>" required>
                      </div>
                      <div class="mb-3">
                        <label for="rak">Rak:</label>
                        <input class="tahun" type="number" id="rak" name="rak" min="1" max="100" value="<?= $v['rak']; ?>" required>
                        <label for="baris">Baris:</label>
                        <input class="tahun" type="number" id="baris" name="baris" min="1" max="100" value="<?= $v['baris']; ?>" required>
                      </div>
                      <div class="mb-3">
                        <label for="hardcopy">Hardcopy:</label>
                        <input class="tahun" type="number" id="hardcopy" name="hardcopy" min="0" max="100" value="<?= $v['hardcopy']; ?>" required>
                        <div class="form-check form-switch form-check-inline">
                          <label class="form-check-label" for="softcopy">Softcopy</label>
                          <input class="form-check-input" type="checkbox" role="switch" id="softcopy" name="softcopy" <?php if ($v['softcopy'] == 1) {
                                                                                                                        echo 'checked="checked"';
                                                                                                                      } ?>>
                        </div>
                      </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btnModal merah" data-bs-dismiss="modal">Cancel</button>
                      <button type="submit" class="btnModal biru">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          <?php }; ?>
        <?php endforeach; ?>
        <div class="modal fade" id="hapusModal<?= $b['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusModalLabel<?= $b['id']; ?>" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
              <h1 class="modal-title fs-5 text-center" id="hapusModalLabel<?= $b['id']; ?>">Hapus <?= $b['judul']; ?> ?</h1>
              <div class="modal-footer" style="display: flex;   justify-content: center;">
                <form action="<?= base_url('/Buku/hapus/'); ?><?= $b['id']; ?>" method="post">
                  <?= csrf_field(); ?>
                  <input type="hidden" name="_method" value="DELETE">
                  <button class="btnModal biru">Ya</button>
                  <button type="button" class="btnModal merah" data-bs-dismiss="modal">Tidak</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="editModal<?= $b['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel<?= $b['id']; ?>" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModalLabel<?= $b['id']; ?>">Edit <?= $b['judul']; ?> ?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="<?= base_url('/Buku/edit/'); ?><?= $b['id']; ?>" method="post">
                <?= csrf_field(); ?>
                <div class=" modal-body">
                  <div class=" mb-3">
                    <input type="text" class="form-control" id="id_publikasi" placeholder="ID-Publikasi" name="id_publikasi" value="<?= $b['id_publikasi']; ?>" required />
                  </div>
                  <div class="mb-3">
                    <input type="text" class="form-control" id="judul" placeholder="Judul Buku" name="judul" value="<?= $b['judul']; ?>" required />
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btnModal merah" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btnModal biru">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="modal fade" id="VersiBuatModal<?= $b['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="VersiBuatModalLabel<?= $b['id']; ?>" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="VersiBuatModalLabel<?= $b['id']; ?>">Buat Versi <?= $b['judul']; ?> ?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="<?= base_url('/Versi/buat/'); ?><?= $b['id']; ?>" method="post">
                <?= csrf_field(); ?>
                <div class=" modal-body">
                  <div class=" mb-3">
                    <input type="text" class="form-control" id="versi" placeholder="Versi" name="versi" required />
                  </div>
                  <div class="mb-3">
                    <input type="text" class="form-control" id="penerbit" placeholder="Penerbit" name="penerbit" required />
                  </div>
                  <select name="bulan" id="bulan" class="form-select mb-3" aria-label="Default select example" required>
                    <option selected value="Januari">Januari</option>
                    <option value="Februari">Februari</option>
                    <option value="Maret">Maret</option>
                    <option value="April">April</option>
                    <option value="Mei">Mei</option>
                    <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>
                    <option value="Agustus">Agustus</option>
                    <option value="September">September</option>
                    <option value="Oktober">Oktober</option>
                    <option value="November">November</option>
                    <option value="Desember">Desember</option>
                  </select>
                  <div class="mb-3">
                    <label for="tahun">Tahun:</label>
                    <input class="tahun" type="number" id="tahun" name="tahun" min="1900" max="2050" value="2000" required>
                  </div>
                  <div class="mb-3">
                    <label for="ruang">Ruang:</label>
                    <input class="tahun" type="number" id="ruang" name="ruang" min="1" max="100" value="1" required>
                    <label for="lorong">Lorong:</label>
                    <input class="tahun" type="number" id="lorong" name="lorong" min="1" max="100" value="1" required>
                  </div>
                  <div class="mb-3">
                    <label for="rak">Rak:</label>
                    <input class="tahun" type="number" id="rak" name="rak" min="1" max="100" value="1" name="rak" required>
                    <label for="baris">Baris:</label>
                    <input class="tahun" type="number" id="baris" name="baris" min="1" max="100" value="1" name="baris" required>
                  </div>
                  <div class="mb-3">
                    <label for="hardcopy">Hardcopy:</label>
                    <input class="tahun" type="number" id="hardcopy" name="hardcopy" min="0" max="100" value="0" required>
                    <div class="form-check form-switch form-check-inline">
                      <label class="form-check-label" for="softcopy">Softcopy</label>
                      <input class="form-check-input" type="checkbox" role="switch" id="softcopy" name="softcopy" value=1 checked>
                    </div>
                  </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btnModal merah" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btnModal biru">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <div class="modal fade" id="LogoutModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="LogoutModalLabel" aria-hidden="true">
        <div style="width: 20%;" class="modal-dialog modal-dialog-centered">
          <div class="modal-content text-center">
            <h1 class="modal-title fs-5 text-center" id="LogoutModal">Logout?</h1>
            <div class="modal-footer" style="display: flex;   justify-content: center;">
              <a href="<?= base_url('/Home/keluar'); ?>">
                <button class="btnModal biru">Ya</button>
              </a>
              <button type="button" class="btnModal merah" data-bs-dismiss="modal">Tidak</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="BukuBuatModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="BukuBuatModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="BukuBuatModalLabel">Buat Buku</h1>
          </div>
          <form action="<?= base_url('/Buku/buat'); ?>" method="post"">
            <?= csrf_field(); ?>

            <div class=" modal-body">
            <div class=" mb-3">
              <input type="text" class="form-control" id="id_publikasi" placeholder="ID-Publikasi" name="id_publikasi" required />
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" id="judul" placeholder="Judul Buku" name="judul" required />
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btnModal merah" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btnModal biru">Submit</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <script src=" https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="<?= base_url('/JS/script.js'); ?>"></script>
</body>

</html>