<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<link rel="stylesheet" href="<?= base_url('/CSS/lapor.css'); ?>" />



<div class="main">

  <div style="padding-top:20px;"> <!-- Lihat Konten -->

    <table class="tabel">

      <thead>

        <tr>

          <th colspan="2" class="h2 text-center text-white">

            Laporan

          </th>

        </tr>

      </thead>

      <tbody class="tabellapor isi">

        <tr>

          <td>Petugas</td>

          <td>:&emsp;<?= $pengawas['nama']; ?></td>

        </tr>

        <tr>

          <td>Tanggal</td>

          <td>:&emsp;<?= $hari . ", " . $presensi['tanggal']; ?></td>

        </tr>

        <tr>

          <td>Mulai</td>

          <td>:&emsp;<?= $mulai; ?></td>

        </tr>

        <tr>

          <td>Selesai</td>

          <td>:&emsp;<?= $selesai; ?></td>

        </tr>

        <tr>

          <td>WhatsApp&nbsp;</td>

          <?php if ($laporan['whatsapp'] == true) { ?>

            <td>:&emsp;Ada chat WhatsApp dari <?= $laporan['inputWA']; ?></td>

          <?php } else { ?>

            <td>:&emsp;Tidak ada chat dari WhatsApp</td>

          <?php }; ?>

        </tr>

        <tr>

          <td>Web Chat&nbsp;</td>

          <?php if ($laporan['webchat'] == true) { ?>

            <td>:&emsp;Ada chat Web chat dari <?= $laporan['inputWC']; ?></td>

          <?php } else { ?>

            <td>:&emsp;Tidak ada chat dari Web chat</td>

          <?php }; ?>

        </tr>

        <tr>

          <td>Pengunjung&nbsp;</td>

          <?php if ($laporan['pengunjung'] == true) { ?>

            <td>:&emsp;Ada Pengunjung atas nama <?= $laporan['inputP']; ?></td>

          <?php } else { ?>

            <td>:&emsp;Tidak ada Pengunjung</td>

          <?php }; ?>

        </tr>

        <tr>

          <td>Catatan&nbsp;</td>

          <?php if ($laporan['catatan']) { ?>

            <td>:&emsp;<?= $laporan['catatan']; ?> </td>

          <?php } else { ?>

            <td>:&emsp;Tidak ada catatan</td>

          <?php }; ?>

        </tr>

        <tr>

          <td>Dibuat&nbsp;</td>

          <td>:&emsp;<?= $laporan['created_at']; ?></td>

        </tr>

        <?php if (strcmp($laporan['created_at'], $laporan['updated_at']) != 0) { ?>

          <tr>

            <td>Diedit&nbsp;</td>

            <td>:&emsp;<?= $laporan['updated_at']; ?></td>

          </tr>

        <?php }; ?>

        <?php if (session()->get('id') == $pengawas['id']) { ?>

          <tr>

            <td colspan="2" class="text-center">

              <button style="outline: 2px solid white;" id="editBtn" class="btnModal biru">Edit</button>

              <button style="outline: 2px solid white;" id="hapusBtn" class="btnModal merah">Hapus</button>

            </td>

          </tr>

        <?php }; ?>

      </tbody>

    </table>



  </div>



  <div id="hapusModal" class="modalLapor">

    <!-- Hapus Konten -->

    <div class="modalLapor-hapus">

      <p class="h3 text-center">Hapus?</p>

      <div class="hapusFooter">

        <form style="padding-top: 5px;" action="<?= base_url('/laporan/hapus'); ?>/<?= $laporan['id']; ?>" method="post" class="d-inline">

          <?= csrf_field(); ?>

          <input type="hidden" name="_method" value="DELETE">

          <button style="outline: 2px solid white;" class="btnModal biru">Hapus</button>

        </form>

        <button onclick="closeHapusModal()" class="btnModal merah">Tidak</button>

      </div>

    </div>

  </div>



  <div id="editModal" class="modalLapor">

    <div class="modallaporan-edit">

      <form class="formEditLaporan" action="<?= base_url('/Laporan/edit'); ?>/<?= $laporan['id']; ?>" method="post">

        <?= csrf_field(); ?>

        <input type="hidden" value="<?= $laporan['id_presensi']; ?>" name="id_presensi" id="id_presensi">

        <div class="formEditRadio">

          <div class="radioForm">

            <p>WhatsApp</p>

            <input type="radio" id="adaWA" name="whatsapp" value=1 onchange="toggleInputWA(this)" <?= ($laporan['whatsapp'] == true) ? 'checked' : ''; ?>>

            <label for="adaWA">Ada</label><br>

            <input type="radio" id="tidakWA" name="whatsapp" value=0 onchange="toggleInputWA(this)" <?= ($laporan['whatsapp'] == true) ? '' : 'checked'; ?>>

            <label for="tidakWA">Tidak</label><br>

            <input class="inputWA" type="text" name="inputWA" id="lockedInputWA" placeholder="Dari..." readonly>

          </div>

          <div class="radioForm">

            <p>Web Chat</p>

            <input type="radio" id="adaWC" name="webchat" value=1 onchange="toggleInputWC(this)" <?= ($laporan['webchat'] == true) ? 'checked' : ''; ?>>

            <label for="adaWC">Ada</label><br>

            <input type="radio" id="tidakWC" name="webchat" value=0 onchange="toggleInputWC(this)" <?= ($laporan['webchat'] == true) ? '' : 'checked'; ?>>

            <label for="tidakWC">Tidak</label><br>

            <input class="inputWC" type="text" name="inputWC" id="lockedInputWC" placeholder="Dari..." readonly>

          </div>

          <div class="radioForm">

            <p>Pengunjung</p>

            <input type="radio" id="adaP" name="pengunjung" value=1 onchange="toggleInputP(this)" <?= ($laporan['pengunjung'] == true) ? 'checked' : ''; ?>>

            <label for="adaP">Ada</label><br>

            <input type="radio" id="tidakP" name="pengunjung" value=0 onchange="toggleInputP(this)" <?= ($laporan['pengunjung'] == true) ? '' : 'checked'; ?>>

            <label for="tidakP">Tidak</label><br>

            <input class="inputP" type="text" name="inputP" id="lockedInputP" placeholder="Atas nama..." readonly>

          </div>

        </div>

        <textarea name="catatan" class="textareaEditCatatan" id="catatan" placeholder='Buat catatan...' maxlength='1000' minlength='0' rows="6"><?= $laporan['catatan']; ?></textarea>

        <div class="formEditRadio foot">

          <button class="btnModal biru" type="submit" value="Submit">Submit</button>

          <a onclick="closeEditModal()" style="text-decoration: none;" class="btnModal merah" type="button">Cancel</a>

        </div>

      </form>

    </div>

  </div>



</div>

<script src="<?= base_url('/JS/lapor.js'); ?>"></script>

<script>

  const defaultInputValueWA = "Tidak ada chat Whatsapp";

  const defaultInputValueWC = "Tidak ada chat Web Chat";

  const defaultInputValueP = "Tidak ada Pengunjung";



  const inputFieldWA = document.getElementById("lockedInputWA");

  const inputFieldWC = document.getElementById("lockedInputWC");

  const inputFieldP = document.getElementById("lockedInputP");



  const inputWA = "<?= ($laporan['whatsapp'] == true) ? $laporan['inputWA'] : ''; ?>";

  const inputWC = "<?= ($laporan['webchat'] == true) ? $laporan['inputWC'] : ''; ?>";

  const inputP = "<?= ($laporan['pengunjung'] == true) ? $laporan['inputP'] : ''; ?>";



  inputFieldWA.value = inputWA;

  inputFieldWC.value = inputWC;

  inputFieldP.value = inputP;



  <?php if ($laporan['whatsapp'] == true) { ?>

    inputFieldWA.removeAttribute('readonly');

    inputFieldWA.required = true;

  <?php } else { ?>

    inputFieldWA.value = defaultInputValueWA;

  <?php }; ?>



  <?php if ($laporan['webchat'] == true) { ?>

    inputFieldWC.removeAttribute('readonly');

    inputFieldWC.required = true;

  <?php } else { ?>

    inputFieldWC.value = defaultInputValueWC;

  <?php }; ?>



  <?php if ($laporan['pengunjung'] == true) { ?>

    inputFieldP.removeAttribute('readonly');

    inputFieldP.required = true;

  <?php } else { ?>

    inputFieldP.value = defaultInputValueP;

  <?php }; ?>



  function toggleInputWA(radio) {



    if (radio.value == 1) {

      inputFieldWA.value = inputWA;

      inputFieldWA.removeAttribute('readonly');

      inputFieldWA.required = true;

    } else {

      inputFieldWA.value = defaultInputValueWA; // Setting default value when Option 2 is selected

      inputFieldWA.setAttribute('readonly', true);

      inputFieldWA.required = false;

    }

  }



  function toggleInputWC(radio) {



    if (radio.value == 1) {

      inputFieldWC.value = inputWC;

      inputFieldWC.removeAttribute('readonly');

      inputFieldWC.required = true;

    } else {

      inputFieldWC.value = defaultInputValueWC; // Setting default value when Option 2 is selected

      inputFieldWC.setAttribute('readonly', true);

      inputFieldWC.required = false;

    }

  }



  function toggleInputP(radio) {



    if (radio.value == 1) {

      inputFieldP.value = inputP;

      inputFieldP.removeAttribute('readonly');

      inputFieldP.required = true;

    } else {

      inputFieldP.value = defaultInputValueP; // Setting default value when Option 2 is selected

      inputFieldP.setAttribute('readonly', true);

      inputFieldP.required = false;

    }

  }

</script>

<?= $this->endSection(); ?>