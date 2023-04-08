<!DOCTYPE html>
<html lang="en">

<head>
<?php $this->load->view('admin/templating/assetAtas') ?>
</head>

<body class="g-sidenav-show  bg-gray-100">
  <!-- sidebar brader -->
  <?php $this->load->view('admin/templating/sidebar') ?>

  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <!-- Navbar -->
    <?php $this->load->view('admin/templating/navbar') ?>

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card" data-tilt="" style="will-change: transform; transform: perspective(1000px) rotateX(0.08deg) rotateY(-0.29deg) scale3d(1, 1, 1);">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Berita</p>
                    <h5 class="font-weight-bolder mb-0">
                      <?= count($berita) ?>
                      <!-- <span class="text-success text-sm font-weight-bolder">+55%</span> -->
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-books text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php if($this->session->userdata('akses_level') != 2){ ?>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card" data-tilt="" style="will-change: transform; transform: perspective(1000px) rotateX(0.08deg) rotateY(-0.29deg) scale3d(1, 1, 1);">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah User</p>
                    <h5 class="font-weight-bolder mb-0">
                      <?= count($user) ?>
                      <!-- <span class="text-success text-sm font-weight-bolder">+3%</span> -->
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="fas fa-user text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
        <!-- <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card" data-tilt="" style="will-change: transform; transform: perspective(1000px) rotateX(0.08deg) rotateY(-0.29deg) scale3d(1, 1, 1);">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Layanan</p>
                    <h5 class="font-weight-bolder mb-0">
                      12
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->
        
      </div>

      <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
          <div class="card" data-tilt="" style="will-change: transform; transform: perspective(1000px) rotateX(0.08deg) rotateY(-0.29deg) scale3d(1, 1, 1);">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-lg-6">
                  <div class="d-flex flex-column h-100">
                    <!-- <p class="mb-1 pt-2 text-bold">Built by developers</p> -->
                    <h5 class="font-weight-bolder">Selamat Datang 😄</h5>
                    <p class="mb-5 text-justify">Sistem informasi management perpustakaan untuk mengelola semua data yang berhubungan dengan perpustakaan</p>
                    <!-- <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                      Baca Selanjutnya
                      <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                    </a> -->
                  </div>
                </div>
                <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                  <div class="bg-gradient-primary border-radius-lg h-100">
                    <img src="<?= base_url() ?>assetsDashboard/img/shapes/waves-white.svg" class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
                    <div class="position-relative d-flex align-items-center justify-content-center h-100">
                      <img class="w-80 position-relative z-index-2 pt-4" src="<?= base_url() ?>assetsDashboard/img/illustrations/gambarWelcome.svg" alt="rocket">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="card h-100 p-3" data-tilt="" style="will-change: transform; transform: perspective(1000px) rotateX(0.08deg) rotateY(-0.29deg) scale3d(1, 1, 1);">
            <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('<?= base_url() ?>assetsDashboard/img/ivancik.jpg');">
              <span class="mask bg-gradient-dark"></span>
              <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                <h5 class="text-white font-weight-bolder mb-4 pt-2">Pengumuman Terkini</h5>
                <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores consequatur sit alias! Inventore</p>
                <!-- <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                  Baca Selanjutnya
                  <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                </a> -->
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- footer brader -->
      <?php $this->load->view('admin/templating/footer') ?>
    </div>
  </main>

  <!-- config website -->
  <?php $this->load->view('admin/templating/config') ?>

  <!--   Core JS Files   -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="<?= base_url() ?>assetsDashboard/js/core/popper.min.js"></script>
  <script src="<?= base_url() ?>assetsDashboard/js/core/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>assetsDashboard/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?= base_url() ?>assetsDashboard/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="<?= base_url() ?>assetsDashboard/js/plugins/chartjs.min.js"></script>
  <script src="<?= base_url() ?>assetsDashboard/js/plugins/tilt.min.js"></script>
  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Sales",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "#fff",
          data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 15,
              font: {
                size: 14,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false
            },
            ticks: {
              display: false
            },
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

    var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
    gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Mobile apps",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#cb0c9f",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            fill: true,
            data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
            maxBarThickness: 6

          },
          {
            label: "Websites",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#3A416F",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
            maxBarThickness: 6
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#b2b9bf',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#b2b9bf',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

    var selector = '.navbar-nav > .nav-item:nth-child(1) > .nav-link';
    $(selector).addClass('active');
      
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url() ?>assetsDashboard/js/jsZen.js?v=1.0.3"></script>
</body>

</html>