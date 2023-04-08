<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('templating/assetAtas') ?>
</head>

<body>

    <?php $this->load->view('templating/navbar') ?>

    <!-- ======= Hero Section ======= -->

    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1>Perpustakaan Asia Malang</h1>
                    <!-- <h2>LIBRARY OF HUMAN KNOWLEDGE</h2> -->
                    <div>
                        <a href="https://perpustakaan.asia.ac.id" class="btn-get-started scrollto">Ingin Cari Buku?
                            😄</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img">
                    <img src="<?= base_url() ?>assetsDashboard/img/logos/<?= $konfigurasi->logo_conf ?>"
                        class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->




    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="row justify-content-between">
                    <div class="col-lg-5 d-flex align-items-center justify-content-center about-img">
                        <img src="<?= base_url() ?>assets/img/undraw_studying_s3l7.svg" class="img-fluid" alt=""
                            data-aos="zoom-in">
                    </div>
                    <div class="col-lg-6 pt-5 pt-lg-0">
                        <h3 data-aos="fade-up">Selamat Datang</h3>
                        <p data-aos="fade-up" data-aos-delay="100">
                            <?= character_limiter(strip_tags(str_replace('&nbsp;','',$konfigurasi->sejarah_conf)),150) ?>
                        </p>
                        <a data-aos="fade-up" data-aos-delay="200" href="<?= base_url('index.php/profile') ?>"
                            style="color: #1e2a57; font-size: 15px;" class="scrollto">Baca Selengkapnya</a>
                        <div class="row">
                            <div class="col-md-6" data-aos="fade-right" data-aos-delay="100">
                                <i class="bx bx-receipt"></i>
                                <h4>Visi</h4>
                                <p style="text-align: justify">
                                    <?= character_limiter(strip_tags($konfigurasi->visi_conf),150) ?></p>
                                <a href="<?= base_url('index.php/profile/visi_misi') ?>"
                                    style="color: #1e2a57; font-size: 15px;" class="scrollto">Baca Selengkapnya</a>
                            </div>
                            <div class="col-md-6" data-aos="fade-left" data-aos-delay="200">
                                <i class="bx bx-collection"></i>
                                <h4>Misi</h4>
                                <p style="text-align: justify">
                                    <?= character_limiter(strip_tags($konfigurasi->misi_conf),150) ?></p>
                                <a href="<?= base_url('index.php/profile/visi_misi') ?>"
                                    style="color: #1e2a57; font-size: 15px;" class="scrollto">Baca Selengkapnya</a>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6" data-aos="fade-left" data-aos-delay="200">
                                <i class="bx bx-user"></i>
                                <h4>Pengunjung</h4>
                                <p style="text-align: justify">
                                    Total Pengunjung &nbsp;&nbsp;&nbsp;   : <strong> <?= $total ?> </strong>
                                    <br>
                                    Pengunjung Hari Ini : <strong><?= $totalHariIni ?></strong>
                                    </p>
                                    
                                <!-- <a href="<?= base_url('index.php/profile/visi_misi') ?>"
                                    style="color: #1e2a57; font-size: 15px;" class="scrollto">Baca Selengkapnya</a> -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Fasilitas Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <!-- <h2>Fasilitas yang tersedia di perpustakaan asia</h2> -->
                    <p>Fasilitas Perpustakaan</p>
                </div>

                <?php
//Columns must be a factor of 12 (1,2,3,4,6,12)
$numOfCols = 4;
$rowCount = 0;
$bootstrapColWidth = 12 / $numOfCols;
foreach ($fasilitas as $fasilitas){
  if($rowCount % $numOfCols == 0) { ?> <div class="row"> <?php } 
    $rowCount++; ?>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="<?= $fasilitas->icon_fasilitas ?>"></i></div>
                            <br>
                            <h4 class="title"><a href=""><?= $fasilitas->judul_fasilitas ?></a></h4>
                            <p class="description"><?= $fasilitas->deskripsi_fasilitas ?></p>
                        </div>
                    </div>

                    <?php
    if($rowCount % $numOfCols == 0) { ?>
                </div> <?php } } ?>

                <!-- <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="lnr lnr-printer"></i></div>
              <br>
              <h4 class="title"><a href="">PRINTING</a></h4>
              <p class="description">Fasilitas print untuk mahasiswa yang tersedia di Perpustakaan Asia</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="lnr lnr-lighter"></i></div>
              <br>
              <h4 class="title"><a href="">EMERGENCY LIGHTS</a></h4>
              <p class="description">Fasilitas lampu darurat dalam ruang yang tersedia di Perpustakaan Asia</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="lnr lnr-select"></i></div>
              <br>
              <h4 class="title"><a href="">ABSEN ONLINE</a></h4>
              <p class="description">Fasilitas absensi kehadiran mahasiswa sebagai anggota Perpustakaan Asia</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="400">
            <div class="icon-box">
              <div class="icon"><i class="lnr lnr-screen"></i></div>
              <br>
              <h4 class="title"><a href="">TELEVISION</a></h4>
              <p class="description">Fasilitas Televisi untuk melihat seluruh informasi Perpustakaan Asia</p>
            </div>
          </div>

        </div> -->

            </div>
        </section><!-- End Fasilitas Section -->

        

        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <!-- <h2>Librarian</h2> -->
                    <p>Librarian</p>
                </div>

                <div class="row" style="justify-content: center">
                    <?php foreach ($user as $user) { ?>
                    <div class="col-xl-3 col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="member">
                            <div class="member-img">
                            <img src="<?= base_url('assetsDashboard/img/user/'.$user->gambar_user) ?>" style="width: 408px; height: 306px; object-fit:cover" class="img-fluid"
                                alt="">
                                <div class="social">
                                    <a href="#"><i class="bi bi-twitter"></i></a>
                                    <a href="#"><i class="bi bi-facebook"></i></a>
                                    <a href="#"><i class="bi bi-instagram"></i></a>
                                    <a href="#"><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            
                            <div class="member-info">
                                
                                    <h4><?= $user->nama_user ?></h4>
                                    <span><?= $user->jabatan_user ?></span>
                                
                            </div>
                        </div>
                    </div>



                    <?php } ?>



                </div>

            </div>
        </section><!-- End Team Section -->

        <!-- ======= Contact Us Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <!-- <h2>Jangan Ragu Untuk Hubungi Kami</h2> -->
                    <p>Hubungi Kami</p>
                </div>

                <div class="row">

                    <div class="col-lg-5 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Lokasi:</h4>
                                <p><?= $konfigurasi->alamat_conf ?></p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p><?= $konfigurasi->email_conf ?></p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Telepon:</h4>
                                <p><?= $konfigurasi->noTelp_conf ?>, Fax (0341) 434 5225</p>
                            </div>

                            <iframe
                                src="https://maps.google.com/maps?q=Jalan%20Soekarno%20Hatta%20-%20Rembuksari%201A,%20Malang,%20Jawa%20Timur&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                        </div>

                    </div>

                    <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up"
                        data-aos-delay="200">
                        <?php $attributes = array('class' => 'php-email-form') ?>
                        <?= form_open(base_url('index.php/home/kirim_email'),$attributes) ?>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Nama</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Contoh: Zain Bagus" required>
                                </div>
                                <div class="form-group col-md-6 mt-3 mt-md-0">
                                    <label for="name">Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Contoh: Zensangkuriang@gmail.com" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="name">Subjek</label>
                                <input type="text" class="form-control" name="subjek" id="subject"
                                    placeholder="Contoh: Referensi Buku Fiksi" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="name">Pesan</label>
                                <textarea class="form-control" name="pesan" rows="10" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Kirim Pesan</button></div>
                        <?= form_close() ?>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Us Section -->

    </main><!-- End #main -->

    <?php $this->load->view('templating/footer') ?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <?php $this->load->view('templating/assetBawah') ?>

</body>

</html>