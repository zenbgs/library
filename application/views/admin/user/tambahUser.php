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

        <div class="container-fluid">
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('<?= base_url() ?>assetsDashboard/img/login/gambarLogin.jpg'); background-position-y: 60%;">
                <span class="mask opacity-6"></span>
            </div>
            <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="https://imgur.com/vXuTzTy.png"
                                class=" w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                Perpustakaan Asia
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                Tambah User
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container-fluid py-4">
            <?php
        if(isset($error_upload)){
        ?>
            <div class="alert alert-danger" role="alert">
                <strong>Gagal!</strong> <?= $error_upload ?>
            </div>
            <?php
        }
        ?>
            <div class="row">
                <div class="col-12 col-xl-6">
                    <div class="card h-100">
                        <div class="card-header pb-0 p-3">
                            <h6 class="mb-0">Tambah User</h6>
                        </div>
                        <div class="card-body p-3">
                            <?= form_open_multipart(base_url('index.php/admin/user/tambah_user')); ?>
                            <div class="form-group">
                                <label for="nama">Nama User</label>
                                <input class="form-control" placeholder="Contoh: Zain Bagus" name="nama" type="text" id="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input class="form-control" placeholder="Contoh: ZenBgs23" name="username" type="text" id="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control" placeholder="Contoh: Password123" name="password" type="password" id="password" required>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-6">
                    <div class="card h-100">

                        <div class="card-body p-3">

                        <div class="form-group">
                                <label for="jabatan">Jabatan User</label>
                                <input class="form-control" placeholder="Contoh: Bagian penanganan masalah" name="jabatan" type="text" id="username" required>
                            </div>

                            <div class="form-group">
                                <label for="foto" class="form-control-label">Foto User</label>
                                <input class="form-control" name="foto" type="file" id="foto" required>
                            </div>

                            <div class="form-group">
                                <label for="akses" class="form-control-label">Akses User</label>
                                <select id="akses" name="akses" class="form-control" required>
                                    <option value="">-- Pilih Akses --</option>
                                    <option value="1">Admin Super</option>
                                    <option value="2">Admin Biasa</option>
                                </select>
                            </div>
                            <br>

                            <div class="form-group">
                                <button type="submit" class="btn bg-gradient-info">Submit</button>
                                <a href="<?= base_url('index.php/admin/berita') ?>" class="btn bg-gradient-secondary"
                                    style="float:right !important;">Kembali</a>
                            </div>

                            <?= form_close() ?>
                        </div>
                    </div>
                </div>


            </div>
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
    <script src="<?= base_url() ?>assetsDashboard/js/plugins/choices.min.js?v=1.0"></script>

    <!-- ckeditor js -->
    <script src="<?= base_url() ?>assetsDashboard/ckeditor/ckeditor.js"></script>
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
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)');

    var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
    gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)');

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

    var selector = '.navbar-nav > .nav-item:nth-child(9) > .nav-link';
    $(selector).addClass('active');
    </script>

    <!-- ckeditor & ckfinder initialize brader -->
    <?php $this->load->view('admin/templating/initialCkeditor') ?>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?= base_url() ?>assetsDashboard/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
</body>

</html>