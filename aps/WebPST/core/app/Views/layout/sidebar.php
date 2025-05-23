<i class="bx bx-menu" id="sidebarOpen"></i>
<nav class="sidebar nothoverable">
  <div class="menu_content">
    <ul class="menu_items">
      <div class="menu_title menu_dahsboard"></div>
      <li class="item">
        <a href="<?= base_url('/pages'); ?>" class="nav_link">
          <span class="navlink_icon">
            <i class="bx bx-home-alt"></i>
          </span>
          <span class="navlink">Beranda</span>
        </a>
      </li>
      <li class="item">
        <a href="<?= base_url('/jadwal'); ?>" class="nav_link">
          <span class="navlink_icon">
            <i class="bi bi-calendar"></i>
          </span>
          <span class="navlink">Jadwal</span>
        </a>
      </li>


      <li class="item">
        <a href="<?= base_url('/laporan'); ?>" class="nav_link">
          <span class="navlink_icon">
            <i class="bi bi-file-text"></i>
          </span>
          <span class="navlink">Laporan Ku</span>
        </a>
      </li>

      <li class="item">
        <a href="<?= base_url('/pages/arsip'); ?>" class="nav_link">
          <span class="navlink_icon">
            <i class="bi bi-files"></i>
          </span>
          <span class="navlink">Arsip</span>
        </a>
      </li>

      <li class="item">
        <a href="<?= base_url('/Pengawas') ;?>" class="nav_link">
          <span class="navlink_icon">
            <i class="bi bi-person-lines-fill"></i>
          </span>
          <span class="navlink">List Pengawas</span>
        </a>
      </li>

      <li class="item">
        <a href="<?= base_url('/pengawas') ;?>/<?= session()->get('username'); ?>" class="nav_link">
          <span class="navlink_icon">
            <i class="bi bi-person-circle"></i>
          </span>
          <span class="navlink">Profil</span>
        </a>
      </li>

      <li class="item">
        <a href="<?= base_url('/Login/keluar') ;?>/<?= session()->get('id'); ?>" class="nav_link submenu_item">
          <span class="navlink_icon">
            <i class="bi bi-door-open-fill"></i>
          </span>
          <span class="navlink">Logout</span>
        </a>
      </li>

    </ul>

    <!-- Sidebar Open / Close -->
    <div class="bottom_content">
      <div class="bottom expand_sidebar">
        <span>Buka</span>
        <i class='bx bx-log-in'></i>
      </div>
      <div class="bottom collapse_sidebar">
        <span>Tutup</span>
        <i class='bx bx-log-out'></i>
      </div>
    </div>
  </div>
</nav>