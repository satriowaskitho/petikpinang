<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="<?= base_url('/CSS/listPengawas.css') ;?>" />
<link rel="stylesheet" href="<?= base_url('/CSS/modalPengawas.css') ;?>" />
<div class="main">
  <div class="judulList">
    <p class="h1 text-center text-white">List Petugas</p>
    <i id="pengawasBuatBtn" class="bi bi-plus-circle-fill iconList" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip" data-bs-title="Tambah Akun"></i>
  </div>
  <table class="tabel">
    <thead>
      <tr class="fs-4">
        <th>Username</th>
        <th>Nama</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody class="fs-4 text-white">
      <?php foreach ($pengawas as $ps) : ?>
        <tr>
          <td><?= $ps['username']; ?></td>
          <td><?= $ps['nama']; ?></td>
          <?php if ($ps['status'] == 1) {; ?>
            <td><i class="dot online"></i> Online</td>
          <?php } else { ?>
            <td><i class="dot offline"></i> Offline</td>
          <?php }; ?>
          <td>
            <a href="<?= base_url('/pengawas') ;?>/<?= $ps['username'];?>" style="text-decoration: none;" class="abtn lihat">Lihat</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
    <tfoot>
      <tr>
        <td class="fs-4" colspan="2">Halaman</td>
        <td style="padding-top: 15px;" class="fs-4" colspan="2"><?php echo $pager->links(); ?></td>
      </tr>
    </tfoot>
  </table>

  <!-- Modal Pengawas -->
  <div id="pengawasBuatModal" class="modalPengawas">
    <!-- Hapus Konten -->
    <div class="modalPengawas-buat">
      <form action="<?= base_url('/Pengawas/buatPengawas') ;?>" method="post">
        <?= csrf_field(); ?>
        <p class="h3 text-center">Buat Petugas</p>
        <div class="divBP">
          <input class="form-control" type="text" placeholder="nama" aria-label="default input example" name="nama" required autofocus/>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">@</span>
            <input type="text" class="form-control" placeholder="username" aria-label="Username" aria-describedby="basic-addon1" name="username" required />
          </div>
          <div class="input-group mb-3">
            <input class="form-control password" id="password" class="block mt-1 w-full" placeholder="password" type="password" name="password" required />
            <span class="input-group-text togglePassword">
              <i id="mata" class="bi bi-eye-slash" style="cursor: pointer" onclick="showPass()"></i>
            </span>
          </div>
        </div>
        <div class="hapusFooter">
          <button class="btnModal biru" type="submit">Ya</button>
          <button onclick="closeBuatModal()" class="btnModal merah" type="button">Tidak</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="<?= base_url('/JS/listPengawas.js') ;?>"></script>
<?= $this->endSection(); ?>