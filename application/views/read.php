<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('templating/assetAtas') ?>
</head>

<body>

    <?php $this->load->view('templating/navbar') ?>




    <main id="main">

        <!-- ======= Blog Single Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row">

                    <div class="col-lg-8 entries">

                       

                        <article class="entry entry-single">

                            <div class="entry-img">
                                <img src="<?= base_url() ?>assetsDashboard/upload/image/<?= $berita->gambar_berita ?>"alt="" class="img-fluid">
                            </div>

                            <h2 class="entry-title">
                                <a href="<?= base_url('index.php/berita/read/'.$berita->slug_berita) ?>"><?= $berita->judul_berita ?></a>
                            </h2>

                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                            href="#"><?= $berita->nama_user ?></a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time
                                                datetime="<?= $berita->tanggal_berita ?>"><?= date('d F Y', strtotime($berita->tanggal_berita)); ?></time></a>
                                    </li>
                                </ul>
                            </div>

                            <div class="entry-content">
                                <?= $berita->isi_berita ?>
                            </div>



                        </article><!-- End blog entry -->

                       

                        <div class="blog-author d-flex align-items-center">
                            <img src="<?= base_url('assetsDashboard/img/user/'.$berita->gambar_user) ?>" class="rounded-circle float-left" alt="">
                            <div>
                                <h4><?= $berita->nama_user ?></h4>
                                <div class="social-links">
                                    <a href="#"><i class="bi bi-twitter"></i></a>
                                    <a href="#"><i class="bi bi-facebook"></i></a>
                                    <a href="#"><i class="biu bi-instagram"></i></a>
                                </div>
                                <p>
                                    <?= $berita->jabatan_user ?>
                                </p>
                            </div>
                        </div><!-- End blog author bio -->

                    </div><!-- End blog entries list -->

                    <div class="col-lg-4">

                        <div class="sidebar">

                            <h3 class="sidebar-title">Cari Berita</h3>
                            <div class="sidebar-item search-form">
                                <form action="">
                                    <input type="text">
                                    <button type="submit"><i class="bi bi-search"></i></button>
                                </form>
                            </div><!-- End sidebar search formn-->

                            <h3 class="sidebar-title">Berita Terbaru</h3>
                            <div class="sidebar-item recent-posts">
                                <?php foreach($listing as $listing) { ?>
                                <div class="post-item clearfix">
                                    <img src="<?= base_url('assetsDashboard/upload/image/thumbs/'.$listing->gambar_berita) ?>"
                                        alt="<?= $listing->judul_berita ?>">
                                    <h4><a
                                            href="<?= base_url('index.php/berita/read/'.$listing->slug_berita) ?>"><?= character_limiter(strip_tags($listing->judul_berita),30) ?></a>
                                    </h4>
                                    <time
                                        datetime="<?= $listing->tanggal_berita ?>"><?= date('d F Y', strtotime($listing->tanggal_berita)); ?></time>
                                </div>
                                <?php } ?>

                            </div><!-- End blog sidebar -->

                        </div>

                    </div>
        </section><!-- End Blog Single Section -->

    </main><!-- End #main -->

    <?php $this->load->view('templating/footer') ?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <?php $this->load->view('templating/assetBawah') ?>

</body>

</html>