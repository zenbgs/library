<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1 class="text-light"><a href="<?= base_url() ?>"><span>LibAsia</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="<?= base_url('index.php/home') ?>">Beranda</a></li>
          <li><a class="nav-link" href="<?= base_url('index.php/berita') ?>">Berita</a></li>
          <li class="dropdown"><a href="#"><span>Profile</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="<?= base_url('index.php/profile') ?>">Sejarah</a></li>
              <li><a href="<?= base_url('index.php/profile/visi_misi') ?>">Visi & Misi</a></li>
              <li><a href="<?= base_url('index.php/profile/struktur_organisasi') ?>">Struktur Organisasi</a></li>
              <li><a href="<?= base_url('index.php/profile/tata_tertib') ?>">Tata Tertib</a></li>
              <li><a href="<?= base_url('index.php/profile/jam_layanan') ?>">Jam Layanan</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Layanan</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="<?= base_url('index.php/layanan') ?>">Layanan Sirkulasi</a></li>
              <li><a href="<?= base_url('index.php/layanan/administrasi') ?>">Layanan Administrasi</a></li>
              <li><a href="<?= base_url('index.php/layanan/printing') ?>">Layanan Print</a></li>
              <li><a href="<?= base_url('index.php/layanan/loker') ?>">Layanan Loker</a></li>
            </ul>
          </li>
          <!-- <li class="dropdown"><a href="#"><span>Jenis Koleksi</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Koleksi Umum</a></li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->

          <li class="dropdown"><a href="#"><span>Prosedur</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="<?= base_url('index.php/prosedur') ?>">Prosedur Pengumpulan Laporan</a></li>
              <li><a href="<?= base_url('index.php/prosedur/sumbangan_buku') ?>">Prosedur Sumbangan Buku</a></li>
              <li><a href="<?= base_url('index.php/prosedur/sirkulasi') ?>">Prosedur Sirkulasi</a></li>
              <li><a href="<?= base_url('index.php/prosedur/peminjaman_loker') ?>">Prosedur Peminjaman Loker</a></li>
            </ul>
          </li>

          <li><a class="nav-link scrollto" href="https://asia.ac.id">Kampus</a></li>

          <li class="dropdown"><a href="#"><span>E-Library</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="https://perpustakaan.asia.ac.id">OPAC Buku</a></li>
              <li><a href="https://laporan.perpustakaan.asia.ac.id">OPAC Laporan</a></li>
            </ul>
          </li>

          <li><a class="nav-link scrollto" href="<?= base_url('index.php/login') ?>">Masuk</a></li>
          <!-- <li><a class="nav-link scrollto" href="#about">About Us</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li> -->
          <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->
          <!-- <li><a class="nav-link scrollto" href="#contact">Contact</a></li> -->
          <!-- <li><a class="getstarted scrollto" href="#about">Get Started</a></li> -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->