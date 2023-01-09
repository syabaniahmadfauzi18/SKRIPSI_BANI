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
                        <a href="/adminDashboard"><span class="fa fa-home mr-3"></span> Dashboard</a>
                    </li>
                    <li>
                        <a href="/adminMasterData"><span class="fa fa-user mr-3"></span> Master Data</a>
                    </li class="active">
                    <li>
                        <a href="/adminAnnualLeaved"><span class="fa fa-briefcase mr-3"></span> Annual Leave Requested</a>
                    </li>
                    <li>
                        <a href="/adminHistoryAbsen"><span class="fa fa-sticky-note mr-3"></span> History Absensi</a>
                    </li>
                    <li>
                        <a href="#"><span class="fa fa-paper-plane mr-3"></span> Setting</a>
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
                <h1>Annual Leave</h1>
                <hr>
                </p>
                <div class="container" id="container_annual">
                    <h2>Tabel Annual Leave Requested</h2>
                    <table class="table table-bordered" id="tabel_annual_leaved">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Requester</th>
                                <th scope="col">Date and Time</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $filtered = array();

                            foreach ($requested as $annual_leaved_data) : ?>
                                <?php
                                if ($annual_leaved_data['status'] === "Requested") {
                                    $karId = "null";

                                    foreach ($data_karyawan as $karyawan) {
                                        if ($karyawan['name'] === $annual_leaved_data['requester_id']) {
                                            $karId = $karyawan['id'];
                                        }
                                    }

                                    $newArr = array(
                                        $annual_leaved_data['id'],
                                        $annual_leaved_data['requester_id'],
                                        $annual_leaved_data['date'],
                                        $annual_leaved_data['attachment'],
                                        "'" . $annual_leaved_data['id'] . "'",
                                        "'" . $annual_leaved_data['requester_id'] . "'",
                                        "'" . $annual_leaved_data['date'] . "'",
                                        "'" . $annual_leaved_data['reason'] . "'",
                                        "'" . $annual_leaved_data['attachment'] . "'",
                                        "'" . $karId . "'"
                                    );

                                    array_push($filtered, $newArr);
                                } ?>
                            <?php endforeach ?>
                            <?php
                            $i = 1;

                            foreach ($filtered as $filtered_data) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $filtered_data[1]; ?></td>
                                    <td><?= $filtered_data[2]; ?></td>
                                    <td><b>Requested</b></td>
                                    <td>
                                        <button type='button' class='btn btn-primary' onclick="ShowDetails(
                                        <?= $filtered_data[4]; ?>
                                        ,<?= $filtered_data[9]; ?>
                                        ,<?= $filtered_data[5]; ?>
                                        ,<?= $filtered_data[6]; ?>
                                        ,<?= $filtered_data[7]; ?>
                                        ,<?= $filtered_data[8]; ?>
                                    )">Action</button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <hr>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="approving_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Approve The Requested Annual Leave</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table>
                                <tr>
                                    <td>
                                        <b>Nama</b>
                                    </td>
                                    <td>
                                        <b>:</b>
                                    </td>
                                    <td id="detail_name" class="ml-3"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Tanggal</b>
                                    </td>
                                    <td>
                                        <b>:</b>
                                    </td>
                                    <td id="detail_date" class="ml-3"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Alasan izin</b>
                                    </td>
                                    <td>
                                        <b>:</b>
                                    </td>
                                    <td id="detail_reason" class="ml-3"></td>
                                </tr>
                            </table>
                            </p>
                            <p><button id="detail_lampiran" type="button" class="btn btn-info" onclick="OpenAttachment()">Download Lampiran</button></p>
                            <p>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Notes</label>
                                <textarea class="form-control" style="background-color:#ebecf0 !important;" id="notes" rows="3"></textarea>
                            </div>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" onclick="OnApprove(true)">Approve</button>
                            <button type="button" class="btn btn-danger" onclick="OnApprove(false)">Reject</button>
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
    <script src="<?php echo base_url('js/sideBar.js') ?>"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('js/multiselect.js') ?>"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        const container_annual_leaved = document.getElementById("container_annual");
        var idToAction;
        var idKaryawanToAction;
        var attachmentAction;

        function StylingTable(id) {
            $(document).ready(function() {
                $(id).dataTable({
                    pagingType: 'full_numbers',
                });
            });
        }

        StylingTable('#tabel_annual_leaved');

        function ShowDetails(id, idKaryawan, name, date, reason, attachment) {
            idToAction = id;
            idKaryawanToAction = idKaryawan;
            document.getElementById("detail_name").innerHTML = name;
            document.getElementById("detail_date").innerHTML = date;
            document.getElementById("detail_reason").innerHTML = reason;
            attachmentAction = attachment;
            $("#approving_modal").modal("toggle");
        }

        function OpenAttachment() {
            window.open('<?= base_url() ?>' + "/lampiran/" + attachmentAction);
        }

        function clearArray(array) {
            while (array.length > 0) {
                array.pop();
            }
        }

        function OnApprove(isApproved) {

            if (isApproved) {
                swal({
                    title: "Success!",
                    text: "Permintaan Izin Di Approve",
                    icon: "success",
                }).then(function() {
                    window.open("/adminAnnualLeaved/updateAnnualLeave/approved/" + idToAction + "/" + idKaryawanToAction, "_self");
                });

            } else {
                swal({
                    title: "Rejected!",
                    text: "Permintaan Izin Telah Ditolak",
                    icon: "warning",
                    dangerMode: true,
                }).then(function() {
                    window.open("/adminAnnualLeaved/updateAnnualLeave/rejected/" + idToAction + "/" + idKaryawanToAction, "_self");
                });
            }
        }
    </script>
</body>

</html>