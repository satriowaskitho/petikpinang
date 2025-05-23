<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div>
  <div class="main">
    <p class="h1 text-center pertama text-white"><?= $pengawas['nama']; ?></p>
    <div class="line-1 depan"></div>
    <div class="waktu">
      <?php if ($presensi) { ?>
        <p class="samping display-2"><?= $mulai; ?></p>
        <p class="samping display-2"><?= $selesai; ?></p>
      <?php } else { ?>
        <p class="samping display-6 text-center">Jam Mulai</p>
        <p class="samping display-6 text-center">Jam Selesai</p>
      <?php }; ?>
    </div>
    <?php if (!$presensi) { ?>
      <a style="text-decoration: none;" class="presensi satu" href="<?= base_url('/Presensi') ;?>">
        <i class="bi bi-plus h2"></i>
        <p style="text-decoration: none;" class="h4" id="presensiContent">Presensi</p>
      </a>
    <?php } else { ?>
      <a style="text-decoration: none;" class="presensi satu" href="<?= base_url('/Presensi/update') ;?>" >
        <i class="bi bi-plus h2"></i>
        <p style="text-decoration: none;"class="h4" id="presensiContent">Presensi</p>
      </a>
    <?php }; ?>
    <a style="text-decoration: none;" class="presensi dua" href="<?= base_url('/laporan') ;?>">
      <i class="bi bi-plus h2"></i>
      <p class="h4" id="laporanContent">Laporan</p>
    </a>
  </div>
  <script src="<?= base_url('/JS/index.js');?>"></script>
</div>
<!-- JavaScript -->
<?= $this->endSection(); ?>