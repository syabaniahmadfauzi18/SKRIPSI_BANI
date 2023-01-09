<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Additional CSS -->
    <link rel="stylesheet" href="<?php echo base_url('css/SideNavBar.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/cardinformation.css') ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Dashboard</title>
</head>

<body class="bg-default">
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar" class="active">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
            </div>
            <div class="p-4">
                <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/logo_white.png" width="30" height="30" alt="logo">
                - Admin Area
                <p>
                <ul class="list-unstyled components mb-5">
                    <li class="active">
                        <a href="/kepsekDashboard"><span class="fa fa-home mr-3"></span> Dashboard</a>
                    </li>
                    <li>
                        <a href="/kepsekMasterData"><span class="fa fa-user mr-3"></span> Master Data</a>
                    </li>
                    <li>
                        <a href="/kepsekHistoryAbsen"><span class="fa fa-sticky-note mr-3"></span> History Absensi</a>
                    </li>
                </ul>
                </p>
            </div>
        </nav>

        <!-- Page Content  -->
        <div id="content">
            <div class="container-fluid">
                <div class="form-inline float-right">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg" width="40" height="40" class="rounded-circle">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="/logout">Log Out</a>
                            </div>
                        </li>
                    </ul>
                    <div class="ml-2">
                        <b>Your Name asdasdadssddsa</b>
                    </div>
                </div>
            </div>
            <?php
            $totalKaryawan = count($data_karyawan);
            $totalAbsensi = count($absensi);
            $totalAnnual = count($requested);
            $totalMasuk = 0;
            $totalIzin = 0;
            $totalNihil = 0;
            $officeA = 0;
            $officeB = 0;
            $status = "Baik";

            foreach ($absensi as $absen) {
                if ($absen['status'] === "Masuk") {
                    $totalMasuk++;
                }
                if ($absen['status'] === "Izin") {
                    $totalIzin++;
                }

                if ($absen['status'] === "Nihil") {
                    $totalNihil++;
                }
            }

            foreach ($data_karyawan as $karyawan) {
                if ($karyawan['office'] === "office-a") {
                    $officeA++;
                } else {
                    $officeB++;
                }
            }

            $totalizindanNihil = $totalIzin + $totalNihil;

            if ($totalMasuk === $totalizindanNihil) {
                $status = "Perlu Pengecekan";
            }

            if ($totalMasuk < $totalizindanNihil) {
                $status = "Buruk";
            }

            ?>
            <div class="container pt-5">
                <p></p>
                <div class="py-5">
                    <div class="container">
                        <div class="header-body">
                            <div class="row">
                                <div class="col-xl-3 col-lg-6">
                                    <div class="card card-stats mb-4 mb-xl-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <h5 class="card-title text-uppercase text-muted mb-0">Total Karyawan</h5>
                                                    <span class="h2 font-weight-bold mb-0">
                                                        <?= $totalKaryawan ?>
                                                    </span>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                                        <i class="fa fa-users"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="mt-3 mb-0 text-muted text-sm">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6">
                                    <div class="card card-stats mb-4 mb-xl-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <h5 class="card-title text-uppercase text-muted mb-0">Data Absen Masuk</h5>
                                                    <span class="h2 font-weight-bold mb-0"><?= $totalAbsensi ?></span>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                                        <i class="fa fa-arrow-down"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="mt-3 mb-0 text-muted text-sm">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6">
                                    <div class="card card-stats mb-4 mb-xl-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <h5 class="card-title text-uppercase text-muted mb-0">Annual Leave Requested</h5>
                                                    <span class="h2 font-weight-bold mb-0"><?= $totalAnnual ?></span>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                                        <i class="fa fa-file"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="mt-3 mb-0 text-muted text-sm">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6">
                                    <div class="card card-stats mb-4 mb-xl-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                                                    <span class="h2 font-weight-bold mb-0"><?= $status ?></span>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                                        <i class="fa fa-arrow-up"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="mt-3 mb-0 text-muted text-sm">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-sm">
                                <h2>Chart Data Officer</h2>
                                <div>
                                    <canvas id="myChart1"></canvas>
                                </div>
                            </div>
                            <div class="col-sm">
                                <h2>Chart Kehadiran Karyawan</h2>
                                <div>
                                    <canvas id="myChart2"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="py-3 my-4 fixed-bottom">
                <p class="text-center text-muted">© 2022 SMK N 1 Cikacung, Inc</p>
            </footer>
        </div>
    </div>



    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Optional JavaScript -->
    <script src="<?php echo base_url('js/sideBar.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart1');
        const ctx2 = document.getElementById('myChart2');

        function ShowChartOfficer(officeA, officeB) {
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Office A', 'Office B'],
                    datasets: [{
                        label: '# of People',
                        data: [officeA, officeB],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }

        function ShowChartKeterlambatan(masuk, izin, nihil) {
            new Chart(ctx2, {
                type: 'doughnut',
                data: {
                    labels: ['Masuk', 'Izin', 'Nihil'],
                    datasets: [{
                        label: '# of People',
                        data: [masuk, izin, nihil],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }

        ShowChartOfficer(<?= $officeA ?>, <?= $officeB ?>);
        ShowChartKeterlambatan(<?= $totalMasuk ?>, <?= $totalIzin ?>, <?= $totalNihil ?>);
    </script>
</body>

</html>