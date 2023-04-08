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
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <?php if($this->session->flashdata('sukses')){ ?>
                            <div class="alert alert-success text-white alert-dismissible fade show" role="alert">
                                <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                <span class="alert-text"><strong>Sukses!</strong>
                                    <?= $this->session->flashdata('sukses') ?></span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php } ?>
                            <h6 style="float: left !important;">Tabel User</h6>
                            <a href="<?= base_url('index.php/admin/user/tambah_user') ?>"
                                class="btn btn-icon btn-sm bg-gradient-success pull-right"
                                style="float: right !important;" type="button">
                                <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                                <span class="btn-inner--text">Tambah User</span>
                            </a>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0" id="datatable-basic">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Nama</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Username</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Akses</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Status</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                    foreach ($user as $user){
                                    ?>

                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="<?= base_url() ?>assetsDashboard/img/user/<?= $user->gambar_user ?>"
                                                            class="avatar avatar-sm me-3" alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm"><?= $user->nama_user ?></h6>
                                                        <p class="text-xs text-secondary mb-0">
                                                            <?= $user->jabatan_user ?></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs text-secondary mb-0"><?= $user->username ?></p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <?php
                                            if($user->akses_user != 1){
                                            ?>
                                                <span class="badge badge-sm bg-gradient-warning">Admin Biasa</span>
                                                <?php }else{ ?>
                                                <span class="badge badge-sm bg-gradient-success">Admin Super</span>
                                                <?php } ?>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <?php
                                            if($user->status_user != 1){
                                            ?>
                                                <span class="badge badge-sm bg-gradient-danger">Non Aktif</span>
                                                <?php }else{ ?>
                                                <span class="badge badge-sm bg-gradient-success">Aktif</span>
                                                <?php } ?>
                                            </td>
                                            <!-- <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold"><?= $user->jabatan_user ?></span>
                                            </td> -->
                                            <td class="align-middle">
                                            <?php
                                            if($user->status_user != 0){
                                            ?>
                                                <a href="<?= base_url('index.php/admin/user/edit/'.$user->id_user) ?>"
                                                    class="text-gradient text-warning font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit User">
                                                    Edit
                                                </a>
                                                &nbsp;
                                                <a href="javascript:;"
                                                    class="text-gradient text-danger font-weight-bold text-xs"
                                                    title="Non Aktif User" data-bs-toggle="modal"
                                                    data-bs-target="#nonaktif<?= $user->id_user ?>">
                                                    Non Aktif
                                                </a>

                                                <?php
                                                include('nonaktif.php');
                                                ?>

                                                <?php }else{ ?>
                                                    <a href="javascript:;"
                                                    class="text-gradient text-success font-weight-bold text-xs"
                                                    title="Aktifkan User" data-bs-toggle="modal"
                                                    data-bs-target="#aktif<?= $user->id_user ?>">
                                                    Aktifkan
                                                </a>

                                                <?php
                                                include('aktif.php');
                                                ?>
                                                <?php } ?>

                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
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
    <script src="<?= base_url() ?>assetsDashboard/js/plugins/sweetalert.min.js?v=1.0"></script>

    <!-- dataTables -->
    <script src="<?= base_url() ?>assetsDashboard/js/plugins/datatables.js"></script>

    <!-- ckeditor js -->
    <script src="<?= base_url() ?>assetsDashboard/ckeditor/ckeditor.js"></script>
    <script>
    $(document).ready(function() {
        $('#datatable-basic').DataTable();
    });
    const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
        searchable: true,
        fixedHeight: false
    });

    const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
        searchable: true,
        fixedHeight: true
    });
    </script>

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

    var selector = '.navbar-nav > .nav-item:nth-child(9) > .nav-link';
    $(selector).addClass('active');
    </script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?= base_url() ?>assetsDashboard/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
</body>

</html>