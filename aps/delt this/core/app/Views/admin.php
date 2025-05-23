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
      <p class="h1 judul">Akses Admin</p>
    </div>
    <div class="main_login">
      <form action="<?= base_url('/Home/masuk'); ?>" method="post">
        <?= csrf_field(); ?>
        <div class="divBP">
          <?php if (session()->getFlashdata('error')) { ?>
            <div class="alert alert-danger">
              <?= session()->getFlashdata('error'); ?>
            </div>
          <?php } ?>
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
        <button class="btnModal biru" type="submit" name="login" value="login">Masuk</button>
      </form>
    </div>
  </div>

  <script src=" https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="<?= base_url('/JS/script.js'); ?>"></script>
</body>