<!DOCTYPE html>
<html lang="en">

<head>
<?php $this->load->view('templating/assetAtas') ?>
</head>

<body>

  <?php $this->load->view('templating/navbar') ?>

  


  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>&nbsp;</h2>
          <ol>
            <li><a style="color: #000" href="#"><?= $breadcrumbHead ?></a></li>
            <li style="font-weight: bold; color: #000"><?= $breadcrumb ?></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <!-- <section class="inner-page">
      <div class="container">
        <p>
          Example inner page template
        </p>
      </div>
    </section> -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

          <?php foreach ($berita as $berita) { ?>

            <article class="entry">

              <div class="entry-img">
                <img src="<?= base_url() ?>assetsDashboard/upload/image/<?= $berita->gambar_berita ?>" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="<?= base_url('index.php/berita/read/'.$berita->slug_berita) ?>"><?= $berita->judul_berita ?></a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#"><?= $berita->nama_user ?></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="<?= $berita->tanggal_berita ?>"><?= date('d F Y', strtotime($berita->tanggal_berita)); ?></time></a></li>
                  <!-- <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">12 Comments</a></li> -->
                </ul>
              </div>

              <div class="entry-content">
                <p>
                <?= character_limiter(strip_tags($berita->isi_berita),349) ?>
                </p>
                <div class="read-more">
                  <a href="<?= base_url('index.php/berita/read/'.$berita->slug_berita) ?>">Baca Selanjutnya</a>
                </div>
              </div>

            </article><!-- End blog entry -->

        <?php } ?>
        <?php if(isset($paginasi) && $total > $limit) { ?>
            <div class="blog-pagination">
              <ul class="justify-content-center">
              <div class="paginasi col-md-12 text-center">
                <?= $paginasi ?>
             </div>
              </ul>
            </div>
            <?php } ?>

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
                <img src="<?= base_url('assetsDashboard/upload/image/thumbs/'.$listing->gambar_berita) ?>" alt="<?= $listing->judul_berita ?>">
                  <h4><a href="<?= base_url('index.php/berita/read/'.$listing->slug_berita) ?>"><?= character_limiter(strip_tags($listing->judul_berita),30) ?></a></h4>
                  <time datetime="<?= $listing->tanggal_berita ?>"><?= date('d F Y', strtotime($listing->tanggal_berita)); ?></time>
                </div>
            <?php } ?>

              </div><!-- End sidebar recent posts-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

    <!-- <div class="row">
      <?php if(isset($paginasi) && $total > $limit) { ?>
          <div class="paginasi col-md-12 text-center">
       <?= $paginasi; ?>
          <div class="clearfix"></div>
          </div>
      <?php } ?>

  </div> -->

  </main><!-- End #main -->

  <?php $this->load->view('templating/footer') ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?php $this->load->view('templating/assetBawah') ?>

</body>

</html>