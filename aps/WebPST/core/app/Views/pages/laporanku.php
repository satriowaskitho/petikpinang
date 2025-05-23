<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="<?= base_url('/CSS/laporanku.css') ;?>" />

<div class="main">
  <p class="h1 text-center text-white pertama">Laporan Ku</p>
  <table class="tabel">
    <thead>
      <tr class="fs-4">
        <th> <i class="bi bi-question-circle-fill iconList" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="TTTT-BB-HH"></i>
          Tanggal</th>
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
            <td><?= $pr['mulai']; ?></td>
            <td><?= $pr['selesai']; ?></td>
            <td>
              <?php if ($pr['ada']) { ?>
                <a href="<?= base_url('/Laporan') ;?>/<?= $pr['id']; ?>" style="text-decoration: none;" id="lihatBtn" class="btnModal lihat">Lihat</a>
              <?php } else {?>
                <a href="<?= base_url('/Laporan') ;?>/<?= $pr['id']; ?>" style="text-decoration: none;" id="lihatBtn" class="btnModal biru">Buat</a>
              <?php }; ?>
              <!-- <button id="editBtn" class="btnModal biru">Edit</button>
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
</div>
<?= $this->endSection(); ?>