<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="<?= base_url('/CSS/arsip.css') ;?>" />
<link rel="stylesheet" href="<?= base_url('/CSS/modalLaporan.css');?>" />
<div class="main">
  <p class="h1 text-center text-white pertama">Arsip</p>
  <table class="tabel">
    <thead>
      <tr class="fs-4">
        <th> <i class="bi bi-question-circle-fill iconList" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="TTTT-BB-HH"></i>
          Tanggal</th>
        <th>Nama</th>
        <th>Mulai</th>
        <th>Selesai</th>
        <th>Laporan</th>
      </tr>
    </thead>
    <tbody class="fs-4 text-white">
      <?php if ($presensi) { ?>
        <?php foreach ($presensi as $pr) : ?>
          <tr>
            <td><?= $pr['tanggal']; ?></td>
            <?php foreach ($pengawas as $ps) :
              if ($ps['id'] == $pr['id_user']) {
            ?><td><?= $ps['nama'] ?></td>
            <?php }
            endforeach; ?>
            <td><?= $pr['mulai']; ?></td>
            <td><?= $pr['selesai']; ?></td>
            <td>
              <?php if ($pr['ada']) { ?>
                <a href="<?=base_url('Laporan/') ;?><?= $pr['id']; ?>" style="text-decoration: none;" id="lihatBtn" class="btnModal lihat">Lihat</a>
              <?php } elseif ($pr['id_user'] == session()->get('id')) { ?>
                <a href="<?=base_url('Laporan/') ;?><?= $pr['id']; ?>" style="text-decoration: none;" id="lihatBtn" class="btnModal biru">Buat</a>
              <?php } else {?>
                Belum ada
              <?php }; ?> <!-- <button id="editBtn" class="btnModal biru">Edit</button>
          <button id="hapusBtn" class="btnModal merah">Hapus</button> -->
            </td>
          </tr>
        <?php endforeach; ?>
      <?php }; ?>
    </tbody>
    <tfoot>
      <tr>
        <td class="fs-4" colspan="3">Halaman</td>
        <td style="padding-top: 15px;" class="fs-4" colspan="2"><?php echo $pager->links(); ?></td>
      </tr>
    </tfoot>
  </table>

  <!-- Lihat Modal
  <div id="lihatModal" class="modallaporan">
    Lihat Konten
    <div class="modallaporan-lihat">
      <span class="silang lihatSilang bi bi-x-circle"></span>
      <table>
        <tbody class="isiModalLaporan">
          <tr>
            <td>WhatsApp&nbsp;</td>
            <td>:&emsp;Tidak ada chat dari WhatsApp</td>
          </tr>
          <tr>
            <td>Web Chat&nbsp;</td>
            <td>:&emsp;Tidak ada chat dari Web</td>
          </tr>
          <tr>
            <td>Pengunjung&nbsp;</td>
            <td>:&emsp;Tidak ada Pengunjung di PST</td>
          </tr>
          <tr>
            <td>Catatan&nbsp;</td>
            <td>:&emsp;chat WA dari</td>
          </tr>
          <tr>
            <td>Dibuat&nbsp;</td>
            <td>:&emsp;11-08-2023 16:00:23</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  Edit Konten
  <div id="editModal" class="modallaporan">
    Edit Konten
    <div class="modallaporan-edit">
      <form class="formEditLaporan">
        <div class="formEditRadio">
          <div>
            <p>WhatsApp</p>
            <input type="radio" id="adaWA" name="WhatsApp" value="Ada" checked="checked">
            <label for="adaWA">Ada</label><br>
            <input type="radio" id="tidakWA" name="WhatsApp" value="Tidak">
            <label for="tidakWA">Tidak</label>
          </div>
          <div>
            <p>Web Chat</p>
            <input type="radio" id="adaWC" name="WebChat" value="Ada" checked="checked">
            <label for="adaWC">Ada</label><br>
            <input type="radio" id="tidakWC" name="WebChat" value="Tidak">
            <label for="tidakWC">Tidak</label>
          </div>
          <div>
            <p>Pengunjung</p>
            <input type="radio" id="adaP" name="Pengunjung" value="Ada" checked="checked">
            <label for="adaP">Ada</label><br>
            <input type="radio" id="tidakP" name="Pengunjung" value="Tidak">
            <label for="tidakP">Tidak</label>
          </div>
        </div>
        <textarea class="textareaEditCatatan" id="catatan" placeholder='Buat catatan...' maxlength='1000' minlength='10' rows="6"></textarea>
        <div class="formEditRadio foot">
          <button class="btnModal biru" type="submit" value="Submit">Submit</button>
          <button onclick="closeEditModal()" class="btnModal merah" type="button">Batal</button>
        </div>
      </form>
    </div>
  </div>

  Hapus Modal
  <div id="hapusModal" class="modallaporan">
    Hapus Konten
    <div class="modallaporan-hapus">
      <p class="h3 text-center">Hapus?</p>
      <div class="hapusFooter">
        <button class="btnModal biru">Ya</button>
        <button onclick="closeHapusModal()" class="btnModal merah">Tidak</button>
      </div>
    </div>
  </div> -->

</div>
<script src="<?= base_url('/JS/laporan.js') ;?>"></script>
<?= $this->endSection(); ?>