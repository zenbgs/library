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
                            <img src="https://imgur.com/vXuTzTy.png" alt="profile_image"
                                class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                Perpustakaan Asia
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                Konfigurasi Website
                            </p>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        <div class="container-fluid py-4">
            <div class="row">
            <?php if($this->session->flashdata('sukses')){ ?>
                        <div class="alert alert-success text-white alert-dismissible fade show" role="alert">
                                <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                <span class="alert-text"><strong>Sukses!</strong> Berhasil merubah konfigurasi website!</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php } ?>
                <div class="col-12 col-xl-6">
                    <div class="card h-100">
                        <div class="card-header pb-0 p-3">
                            <h6 class="mb-0">Konfigurasi Profil</h6>
                        </div>
                        <div class="card-body p-3">
                        <?= form_open_multipart(base_url('index.php/admin/konfigurasi/edit/'.$konfigurasi->id_conf)); ?>
                                <div class="form-group">
                                    <label for="visi">Visi</label>
                                    <textarea class="form-control" name="visi" id="visi" rows="3"><?= $konfigurasi->visi_conf ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="editor-halaman-1">Misi</label>
                                    <textarea class="form-control" name="misi" id="editor-halaman-1" rows="3"><?= $konfigurasi->misi_conf ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="editor-halaman-2">Sejarah</label>
                                    <textarea class="form-control" name="sejarah" id="editor-halaman-2" rows="3"><?= $konfigurasi->sejarah_conf ?></textarea>
                                </div>

                            
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-6">
                    <div class="card h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-md-12 d-flex align-items-center">
                                    <h6 class="mb-0">Konfigurasi Website</h6>
                                </div>
                                <!-- <div class="col-md-4 text-end">
                                    <a href="javascript:;">
                                        <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Edit Profile"></i>
                                    </a>
                                </div> -->
                            </div>
                        </div>
                        <div class="card-body p-3">
                        
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Logo Website</label>
                                    <input class="form-control" name="logo" type="file" id="example-text-input">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Alamat</label>
                                    <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3"><?= $konfigurasi->alamat_conf ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">No Telp</label>
                                    <input class="form-control" name="noTelp" value="<?= $konfigurasi->noTelp_conf ?>" placeholder="(0341) 478877, Fax (0341) 434 5225" type="text" id="example-text-input">
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Email</label>
                                    <input class="form-control" name="email" value="<?= $konfigurasi->email_conf ?>" placeholder="Perpusasia@gmail.com" type="email" id="example-text-input">
                                </div>
                                <br>
                                
                                <div class="form-group">
                                <button type="submit" class="btn bg-gradient-info">Submit</button>
                                <!-- <button type="button" class="btn bg-gradient-secondary" style="float:right !important;">Kembali</button> -->
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

    var selector = '.navbar-nav > .nav-item:nth-child(8) > .nav-link';
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