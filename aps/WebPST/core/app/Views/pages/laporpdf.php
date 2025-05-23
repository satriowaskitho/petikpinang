<style>
  @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
  }

  .tabel {
    width: 80%;
    margin-left: auto;
    margin-right: auto;
    margin-top: 50px;
    border-collapse: collapse;
    border-radius: 10px;
    /* Set border-radius to round the corners */
    overflow: hidden;
  }

  td,
  th {
    font-size: 2em;
  }

  th {
    padding-bottom: 80px;
  }

  .judul {
    border: 2px solid black;
    margin: auto;
    width: 20%;
    border-radius: 10px;
  }
</style>

<div style="padding-top:20px;"> <!-- Lihat Konten -->
  <table class="tabel">
    <thead>
      <tr>
        <th colspan="2" class="h2 text-center">
          <p class="judul">Laporan</p>
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
    </tbody>
  </table>
</div>