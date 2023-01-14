<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('css/cardinformation.css') ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

    <title>Home Page</title>
</head>

<body>
    <?php
    $targetID = "null";
    $targetID = strval($current_id);

    foreach ($users as $user) {
        if ($user->id === $current_id) {
            foreach ($data_karyawan as $karyawan) {
                $io = $karyawan['username'];
                echo ("<script>console.log('<?= $io ?>' + '<?= $user->username ?>')</script>");
                if ($karyawan['username'] === $user->username) {
                    $targetID = $karyawan['id'];
                }
            }
        }
    }

    $userName = "null";

    foreach ($data_karyawan as $karyawan) {
        if ($karyawan['id'] === $targetID) {
            $userName = $karyawan['name'];
        }
    }

    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="http://localhost:8080/home">
            <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/logo_white.png" width="30" height="30" alt="logo">
            Online Attendance System </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-4" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            </ul>
            <div class="form-inline my-2 my-lg-0 text-white">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg" width="40" height="40" class="rounded-circle">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <div class="dropdown-item"><b><?= $user->username ?></b></div>
                            <a class="dropdown-item" href="/logout">Log Out</a>
                        </div>
                    </li>
                </ul>
                <b><?= $userName ?></b>
            </div>
        </div>
    </nav>
    <p></p>
    <div class="mt-2 d-flex justify-content-center">
        <img src='<?= base_url("images/banner.png"); ?>' class=" img-fluid" alt="Responsive image">
    </div>

    <div class="py-5">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Check In Information</h1>
                <hr>
                <h2 class="display-5" id="day-info">Day : </h2>
                <h2 class="display-5" id="work-info">Check-In : Not Yet</h2>
            </div>
        </div>
    </div>
    <p align="center">
        <button type="button" class="btn btn-primary btn-lg" id="checkin-btn" onclick="CheckIn('<?= $userName ?>')">Check-In</button></a><br><br>
        <button type=" button" class="btn btn-success btn-lg" onclick="ReqAnnualLeave('<?= $userName ?>')">Request Annual Leave</button>
        <button type=" button" class="btn btn-warning btn-lg" onclick="window.print()">Download Riwayat Absensi</button>
    </p>
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
        <hr>
        <h1 class="text-center"> Summary Absensi Seluruh Karyawan</h1>
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
    <div class="container mt-3" id="container_absensi">
        <hr>
        <h1 class="text-center"> Riwayat Kehadiran</h1>
        <table class="table table-bordered" id="tabel_detail_absen">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status Kehadiran</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                $name = "null";
                $date = "null";
                $status = "null";

                foreach ($absensi as $absen) :
                ?>
                    <?php
                    foreach ($data_karyawan as $karyawan) {
                        if ($karyawan['id'] === $absen['id_karyawan']) {
                            $name = $karyawan['name'];
                        }
                    }

                    $date = $absen['date'];
                    $status = $absen['status'];
                    ?>
                    <tr>
                        <th scope="row"><?= $i++ ?></th>
                        <td><?= $name ?></td>
                        <td><?= $date ?></td>
                        <td><b><?= $status ?></b></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <div class="container pt-5 mt-3" id="container_annual">
        <h1 class="text-center">Riwayat Annual Leave Requested</h1>
        <table class="table table-bordered" id="tabel_annual_leaved">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Requester</th>
                    <th scope="col">Date and Time</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $d = 1;
                ?>
                <?php foreach ($requested as $annualData) : ?>
                    <tr>
                        <th scope="row"><?= $d++ ?></th>
                        <td><?= $annualData['requester_id'] ?></td>
                        <td><?= $annualData['date'] ?></td>
                        <td><?= $annualData['status'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <footer class="py-3 my-4">
        <p class="text-center text-muted">© 2022 SMK N 1 Cikacung, Inc</p>
    </footer>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Optional JavaScript -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="http://localhost/skipsibani/assets/plugins/fapicker/dist/js/fontawesome-iconpicker.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <script>
        function CheckIn(username) {
            if (username == "null") {
                SetData();
            } else {
                window.open("checkin", "_self");
            }
        }

        function ReqAnnualLeave(username) {
            if (username == "null") {
                SetData();
            } else {
                window.open('/reqAnnualLeave/' + '<?= $targetID ?>', '_self');
            }
        }

        function SetData() {
            swal({
                title: "Warning!",
                text: "Data anda belum di setting oleh admin beritahukan username anda agak dapat melakukan absen",
                icon: "warning",
                button: "Ok",
                dangerMode: true,
            });
        }

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

    <script>
        const date = new Date();

        let dayName = getDayName(date.getDay());
        let day = formatedNumber(date.getDate());
        let month = formatedNumber(date.getMonth() + 1);
        let year = formatedNumber(date.getFullYear());

        function getDayName(day) {
            let dayName = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"][day];
            return dayName;
        }

        function formatedNumber(n) {
            return n > 9 ? "" + n : "0" + n;
        }

        let currentDate = `${dayName} ${day}-${month}-${year}`;
        let currentDateFormat = `${year}-${month}-${day}`;
        var dayInfo = document.getElementById("day-info");
        dayInfo.innerHTML = "Day : " + currentDate;

        function CheckInChecker(dateTarget) {
            console.log("MASUK " + dateTarget + " " + currentDateFormat);
            if (dateTarget == currentDateFormat) {
                $field = document.getElementById("work-info").innerHTML = "Check In : Recorded";
                document.getElementById("checkin-btn").style.display = 'none';
            }
        }

        function StylingTable(id) {
            $(document).ready(function() {
                $(id).dataTable({
                    dom: 'lrt',
                    pagingType: 'full_numbers',
                    searching: true,
                    "oSearch": {
                        "sSearch": '<?= $userName ?>'
                    }
                });
            });
        }

        StylingTable("#tabel_detail_absen");
        StylingTable("#tabel_annual_leaved");
    </script>

    <?php
    foreach ($absensi as $absen) {
        if ($absen['id_karyawan'] === $targetID) {
            echo ("<script>CheckInChecker('" . $absen['date'] . "')</script>");
        }

        if ($userName === "null") {
            echo ("<script>SetData()</script>");
        }
    }
    ?>
</body>

</html>