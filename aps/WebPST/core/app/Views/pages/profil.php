<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="<?= base_url('/CSS/profil.css');?>" />
<link rel="stylesheet" href="<?= base_url('/CSS/modalPengawasEdit.css') ;?>" />
<div class="main">
  <div class="profilBox">
    <p class="h1 text-center text-white"><?= $pengawas['nama']; ?></p>
    <div class="line-1"></div>
    <p class="text-center text-white usnametext">Username</p>
    <div class="isiUsname text-center fs-5"><?= $pengawas['username']; ?></div>

    <?php if (session()->get('role') == 'admin' || session()->get('id') == $pengawas['id']) { ?>
      <p class="text-center text-white usnametext">Password</p>
      <!-- <div class="isiUsname text-center fs-5"><?= $pengawas['password']; ?></div> -->

      <div id="divtutup" class="input-group-ku">
        <div class="form-control-ku text-center fs-5">&#x25CF &#x25CF &#x25CF &#x25CF &#x25CF &#x25CF &#x25CF</div>
        <span id="pwtutup" class="input-group-addon-ku bi bi-eye-slash" onclick="showPW()"></span>
      </div>

      <div id="divbuka" class="input-group-ku" hidden>
        <div class="form-control-ku text-center fs-5"><?= $pengawas['password']; ?></div>
        <span id="pwbuka" class="input-group-addon-ku bi bi-eye"  onclick="showPW()"></span>
      </div>

      <div style="display: flex;justify-content: center; margin:25px;">
        <button style="margin-right: 10px; outline: 2px solid white;" id="pengawasEditBtn" class="btnModal biru">Edit</button>
        <?php if (session()->get('role') == 'admin') { ?>
          <button style="outline: 2px solid white;" id="hapusBtn" class="btnModal merah">Hapus</button>
        <?php } else { ?>
          <button style="visibility: hidden;" id="hapusBtn"></button>
        <?php }; ?>
      <?php }; ?>
      </div>
  </div>


  <div id="pengawasEditModal" class="modalPengawas">
    <div class="modalPengawas-edit">
      <form action="<?= base_url('/Pengawas/edit') ;?>/<?= $pengawas['id']; ?>" method="post">
        <?= csrf_field(); ?>
        <p class="h3 text-center">Edit Pengawas</p>
        <div class="divBP">
          <input value="<?= $pengawas['nama']; ?>" class="form-control" type="text" placeholder="nama" aria-label="default input example" name="nama" required />
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">@</span>
            <input value="<?= $pengawas['username']; ?>" type="text" class="form-control" placeholder="username" aria-label="Username" aria-describedby="basic-addon1" name="username" required />
          </div>
          <div class="input-group mb-3">
            <input value="<?= $pengawas['password']; ?>" class="form-control password" id="password" class="block mt-1 w-full" placeholder="password" type="password" name="password" required />
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

  <div id="hapusModal" class="modalPengawas">
    <!-- Hapus Konten -->
    <div class="modalPengawas-hapus">
      <p class="h3 text-center">Hapus?</p>
      <div class="hapusFooter">
        <form style="padding-top: 5px;" action="<?= base_url('/pengawas/hapus') ;?>/<?= $pengawas['id']; ?>" method="post" class="d-inline">
          <?= csrf_field(); ?>
          <input type="hidden" name="_method" value="DELETE">
          <button class="btnModal biru">Ya</button>
        </form>
        <button onclick="closeHapusModal()" class="btnModal merah">Tidak</button>
      </div>
    </div>
  </div>


</div>
<script src="<?= base_url('/JS/profil.js') ;?>"></script>
<?= $this->endSection(); ?>