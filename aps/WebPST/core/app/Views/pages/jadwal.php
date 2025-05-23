<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="<?= base_url('/CSS/jadwal.css') ;?>" />
<div class="main">
  <div class="judulJadwal">
    <p class="h1 text-center text-white">Jadwal</p>
    <?php if (session()->get('role') == 'admin') { ?>
      <i id="judulBuatBtn" class="bi bi-plus-circle-fill iconList" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip" data-bs-title="Tambah Jadwal"></i>
    <?php } else { ?>
      <i id="judulBuatBtn" hidden></i>
    <?php }; ?>
  </div>

  <table class="tabel">
    <thead>
      <tr class="fs-4">
        <th>Tanggal</th>
        <th>Jadwal</th>
      </tr>
    </thead>
    <tbody class="fs-4 text-white">
      <?php foreach ($jadwal as $jw) : ?>
        <tr>
          <td><?= $jw['bulan']; ?></td>
          <td>
            <button type="button" class="btnModal lihat" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $jw['id']; ?>">
              Lihat
            </button>
            <?php if (session()->get('role') == 'admin') { ?>
              <button type="button" class="btnModal merah" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $jw['id']; ?>">
                hapus
              </button>
            <?php }; ?>
          </td>
          <div class="modal fade" id="exampleModal<?= $jw['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel<?= $jw['id']; ?>" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel<?= $jw['id']; ?>">Jadwal <?= $jw['bulan']; ?></h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                  <img src="<?=base_url('/IMG') ;?>/<?= $jw['gambar']; ?>" class="img-fluid" alt="Harusnya ada gambar">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btnModal lihat" data-bs-dismiss="modal">Tutup</button>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="hapusModal<?= $jw['id']; ?>" tabindex="-1" aria-labelledby="hapusModalLabel<?= $jw['id']; ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="hapusModal<?= $jw['id']; ?>">Hapus <?= $jw['bulan']; ?> ?</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                  <form action="<?= base_url('/Jadwal/hapus/') ;?><?= $jw['id']; ?>" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btnModal biru">Ya</button>
                  </form>
                  <button type="button" class="btnModal merah" data-bs-dismiss="modal">Tidak</button>
                </div>
              </div>
            </div>
          </div>
        </tr>
      <?php endforeach; ?>
    </tbody>
    <tfoot>
      <tr>
        <td class="fs-4">Halaman</td>
        <td style="padding-top: 15px;" class="fs-4"><?php echo $pager->links(); ?></td>
      </tr>
    </tfoot>
  </table>

  <div id="jadwalBuatModal" class="modalJadwal">
    <!-- Hapus Konten -->
    <div class="modalJadwal-buat">
      <form action="<?= base_url('/Jadwal/buat') ;?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <p class="h3 text-center divBP">Buat Jadwal</p>
        <div class="mb-3">
          <input name="gambar" class="form-control inputGambar fs-5" type="file" id="formFile" required>
        </div>
        <div class="text-center divBP">
          <input type="month" id="tanggal" name="tanggal" class="bulan fs-5" required>
        </div>
        <div class="hapusFooter">
          <button class="btnModal biru" type="submit">Ya</button>
          <button onclick="closeBuatModal()" class="btnModal merah" type="button">Tidak</button>
        </div>
      </form>
    </div>
  </div>

</div>
<script src="<?=base_url('/JS/jadwal.js') ;?>"></script>
<?= $this->endSection(); ?>