<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="<?= base_url('/CSS/arsip.css') ;?>" />
<link rel="stylesheet" href="<?= base_url('/CSS/modalBuatLaporan.css') ;?>" />
<div class="main">
  <div id="editModal">
    <div class="modallaporan-edit">
      <form class="formEditLaporan" action="<?=base_url('/Laporan/buatLaporan') ;?>" method="post">
        <?= csrf_field(); ?>
        <input type="hidden" value="<?= $id_presensi; ?>" name="id_presensi" id="id_presensi">
        <div class="formEditRadio">
          <div class="radioForm">
            <p>WhatsApp</p>
            <input type="radio" id="adaWA" name="whatsapp" value=1 onchange="toggleInputWA(this)">
            <label for="adaWA">Ada</label><br>
            <input type="radio" id="tidakWA" name="whatsapp" value=0 onchange="toggleInputWA(this)" checked="checked">
            <label for="tidakWA">Tidak</label><br>
            <input class="inputWA" type="text" name="inputWA" id="lockedInputWA" placeholder="Dari..." readonly>
          </div>
          <div class="radioForm">
            <p>Web Chat</p>
            <input type="radio" id="adaWC" name="webchat" value=1 onchange="toggleInputWC(this)">
            <label for="adaWC">Ada</label><br>
            <input type="radio" id="tidakWC" name="webchat" value=0 onchange="toggleInputWC(this)" checked="checked">
            <label for="tidakWC">Tidak</label><br>
            <input class="inputWC" type="text" name="inputWC" id="lockedInputWC" placeholder="Dari..." readonly>
          </div>
          <div class="radioForm">
            <p>Pengunjung</p>
            <input type="radio" id="adaP" name="pengunjung" value=1 onchange="toggleInputP(this)">
            <label for="adaP">Ada</label><br>
            <input type="radio" id="tidakP" name="pengunjung" value=0 onchange="toggleInputP(this)" checked="checked">
            <label for="tidakP">Tidak</label><br>
            <input class="inputP" type="text" name="inputP" id="lockedInputP" placeholder="Atas nama..." readonly>
          </div>
        </div>
        <textarea name="catatan" class="textareaEditCatatan" id="catatan" placeholder='Buat catatan...' maxlength='1000' minlength='0' rows="6"></textarea>
        <div class="formEditRadio foot">
          <button class="btnModal biru" type="submit" value="Submit">Submit</button>
          <a href="<?= base_url('/laporan') ;?>" style="text-decoration: none;" class="btnModal merah" type="button">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="<?= base_url('/JS/createlaporan.js') ;?>"></script>
<?= $this->endSection(); ?>