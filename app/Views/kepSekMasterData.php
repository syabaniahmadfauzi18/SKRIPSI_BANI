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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url('css/multiselect.css') ?>" type="text/css" />

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
                    <li>
                        <a href="/kepsekDashboard"><span class="fa fa-home mr-3"></span> Dashboard</a>
                    </li>
                    <li class="active">
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

            <div class="container pt-5">
                <p></p>
                <h1>MASTER DATA</h1>
                <hr>
                Select the table to show
                <p>
                    <select id="Tabel_List" multiple="multiple">
                        <option value="tabel_karyawan" selected="selected">Tabel Data Karyawan</option>
                        <option value="tabel_annual_leave">Tabel Annual Leave Requested</option>
                        <option value="tabel_absensi">Tabel Absensi Karyawan</option>
                    </select>
                </p>
                <button type="button" class="btn btn-primary" onclick="window.print()">Dowload Rekapitulasi</button>
                <hr>
                <div class="container" id="container_data_karyawan">
                    <h2>Tabel Data Karyawan</h2>
                    <table class="table table-bordered" id="tabel_data_karyawan">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Position</th>
                                <th scope="col">Office</th>
                                <th scope="col">Age</th>
                                <th scope="col">Start date</th>
                                <th scope="col">Salary</th>
                                <th scope="col">Phone</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($data_karyawan as $karyawan) :
                            ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $karyawan['name'] ?></td>
                                    <td><?= $karyawan['position'] ?></td>
                                    <td><?= $karyawan['office'] ?></td>
                                    <?php $today = date("Y-m-d");
                                    $diff = date_diff(date_create($karyawan['ttl']), date_create($today)); ?>
                                    <td><?= $diff->format('%y') ?></td>
                                    <td><?= $karyawan['start_date'] ?></td>
                                    <td><?= "Rp. " . number_format($karyawan['salary'], 2) ?></td>
                                    <td><?= $karyawan['phone'] ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="container" id="container_annual">
                    <h2>Tabel Annual Leave Requested</h2>
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
                <hr>
                <div class="container" id="container_absensi">
                    <h2>Tabel Absensi Karyawan</h2>
                    <table class="table table-bordered" id="tabel_absensi_karyawan">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Presence</th>
                                <th scope="col">Annual Leave</th>
                                <th scope="col">Nihil</th>
                                <th scope="col">Category</th>
                                <th scope="col">Show Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $f = 1;
                            foreach ($data_karyawan as $karyawan) : ?>
                                <tr>
                                    <th scope="row"><?= $f++ ?></th>
                                    <?php
                                    $absenName = $karyawan['name'];
                                    $idKaryawan = $karyawan['id'];
                                    ?>
                                    <td><?= $absenName ?></td>
                                    <?php
                                    $presence = 0;
                                    $annual = 0;
                                    $nihil = 0;
                                    $category = "OK";
                                    foreach ($absensi as $absen) : ?>
                                        <?php
                                        if ($idKaryawan === $absen['id_karyawan']) {
                                            if ($absen['status'] === "Masuk") {
                                                $presence++;
                                            } else if ($absen['status'] === "Izin") {
                                                $annual++;
                                            } else {
                                                $nihil++;
                                            }
                                        }
                                        ?>
                                    <?php endforeach ?>
                                    <?php
                                    $totalAnnualAndNihil = $annual + $nihil;

                                    if ($presence > $totalAnnualAndNihil) {
                                        $category = "GOOD";
                                    } else if ($presence === $totalAnnualAndNihil) {
                                        $category = "Need To Be Reprimanded";
                                    } else {
                                        $category = "BAD";
                                    }
                                    ?>
                                    <td><?= $presence ?></td>
                                    <td><?= $annual ?></td>
                                    <td><?= $nihil ?></td>
                                    <td><b><?= $category ?></b></td>
                                    <td><button type="button" class="btn btn-info" onclick=" window.open('/adminHistoryAbsen/'+'<?= $absenName ?>', '_self')">Details</button></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modal_remove_karyawan" tabindex="-1" role="dialog" aria-labelledby="modal_remove_karyawan" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="modal_remove_karyawanTitle">ALERT!</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Anda yakin akan menghapus data karyawan ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="RemoveEmployeeData()">Ya</button>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="py-3 my-4">
                <p class="text-center text-muted">© 2022 SMK N 1 Cikacung, Inc</p>
            </footer>
        </div>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Optional JavaScript -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?php echo base_url('js/sideBar.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/multiselect.js') ?>"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        var TargetDeletedData;

        function SetTargetDeletedData(target) {
            TargetDeletedData = target;
        }

        function RemoveEmployeeData() {
            console.log(TargetDeletedData);
            swal({
                title: "Success!",
                text: "Anda telah berhasil menghapus data karyawan",
                icon: "success",
                button: "Ok",
            })

            window.open(window.location.href + "/DeleteKaryawan/" + TargetDeletedData, "_self");
        }

        function EditEmployeeData($employeeId) {
            window.open(window.location.href + "/editDataKaryawan/" + $employeeId, "_self");
        }
    </script>
    <script type="text/javascript">
        var isVisible = false;

        const table_list_selected = document.getElementById("Tabel_List");
        const container_data_karyawan = document.getElementById("container_data_karyawan");
        const container_annual_leaved = document.getElementById("container_annual");
        const container_absensi = document.getElementById("container_absensi");

        $(document).ready(function() {
            $('#Tabel_List').multiselect();
        });

        $(document).ready(function() {
            $('#bulan_absensi').multiselect();
        });

        $(document).ready(function() {
            $('#tahun_absensi').multiselect();
        });

        function StylingTable(id) {
            $(document).ready(function() {
                $(id).dataTable({
                    pagingType: 'full_numbers',
                });
            });
        }

        var tableInArray = new Array();
        var isnull = true;

        function AutoCheckTableDisplay() {

            if (isnull === true) {
                isnull = false;
                tableInArray.push(container_data_karyawan);
                tableInArray.push(container_annual_leaved);
                tableInArray.push(container_absensi);
            }

            for (i = 0; i < table_list_selected.options.length; i++) {
                if (table_list_selected.options[i].selected) {
                    tableInArray[i].style.display = "block";
                } else {
                    tableInArray[i].style.display = "none"
                }
            }
        }

        function CloseDetails() {
            $(document).ready(function() {
                $('#details_modal').modal("toggle");
            });
        }

        StylingTable('#tabel_data_karyawan');
        StylingTable('#tabel_annual_leaved');
        StylingTable('#tabel_absensi_karyawan');
        StylingTable('#tabel_detail_absen');
        AutoCheckTableDisplay();

        var intervalId = window.setInterval(function() {
            AutoCheckTableDisplay();
        }, 2000);
    </script>
</body>

</html>