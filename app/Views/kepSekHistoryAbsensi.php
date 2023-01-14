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
                - Kepsek Area
                <p>
                <ul class="list-unstyled components mb-5">
                    <li>
                        <a href="/kepsekDashboard"><span class="fa fa-home mr-3"></span> Dashboard</a>
                    </li>
                    <li>
                        <a href="/kepsekMasterData"><span class="fa fa-user mr-3"></span> Master Data</a>
                    </li>
                    <li class="active">
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
                        <b>Kepala Sekolah</b>
                    </div>
                </div>
            </div>

            <div class="container pt-5">
                <p></p>
                <h1>History Absensi</h1>
                <hr>
                <button type="button" class="btn btn-primary" onclick="window.print()">Download Rekapitulasi Absen</button>
                <p></p>
                <div class="container" id="container_absensi">
                    <table class="table table-bordered" id="tabel_detail_absen">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Day</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status Kehadiran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            $name = "null";
                            $day = "null";
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

                                $day = "Sunday";
                                $date = $absen['date'];
                                $status = $absen['status'];
                                ?>
                                <tr>
                                    <th scope="row"><?= $i++ ?></th>
                                    <td><?= $name ?></td>
                                    <td><?= $day ?></td>
                                    <td><?= $date ?></td>
                                    <td><b><?= $status ?></b></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>

                    <button type="button" class="btn btn-info" onclick=' window.open("/adminMasterData", "_self")'>Back To Master Data</button>
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
    <script src="<?php echo base_url('js/sideBar.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/multiselect.js') ?>"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        const container_absensi = document.getElementById("container_absensi");

        $(document).ready(function() {
            $('#bulan_absensi').multiselect();
        });

        $(document).ready(function() {
            $('#tahun_absensi').multiselect();
        });

        function StylingTable(id, autoSearchKey) {
            console.log("AUTO SEARCH : " + autoSearchKey);
            $(document).ready(function() {
                $(id).dataTable({
                    pagingType: 'full_numbers',
                    searching: true,
                    "oSearch": {
                        "sSearch": autoSearchKey
                    }
                });
            });
        }

        StylingTable('#tabel_detail_absen', '<?= $autoSearchKey ?>');
    </script>
</body>

</html>