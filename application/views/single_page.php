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

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-12 entries">

            <article class="entry entry-single">

                <div class="entry-img">

                </div>

                <h2 class="entry-title text-center">
                  <a href="#"><?= $judul ?></a>
                </h2>

                <div class="entry-content">
                <?php if($breadcrumb != "Visi Misi"){ ?>
                <?= $isi ?>
                <?php }else{ ?>
                  <h2><span style="color:#c0392b"><span style="font-family:Comic Sans MS,cursive"><span style="font-size:20px"><u><strong>VISI:</strong></u></span></span></span></h2>
                  <?= $visi ?>
                  <h2><span style="color:#c0392b"><span style="font-family:Comic Sans MS,cursive"><span style="font-size:20px"><u><strong>MISI:</strong></u></span></span></span></h2>
                  <?= $misi ?>
                  <?php } ?>
                </div>

            </article><!-- End blog entry -->

          



          </div><!-- End blog entries list -->



        </div>

      </div>
    </section><!-- End Blog Single Section -->

  </main><!-- End #main -->

  <?php $this->load->view('templating/footer') ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?php $this->load->view('templating/assetBawah') ?>

</body>

</html>