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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
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
                    <li class="active">
                        <a href="/adminMasterData"><span class="fa fa-user mr-3"></span> Master Data</a>
                    </li>
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
                <?php
                $count = count($data_karyawan) + 1;
                $id = "adm" . $count;
                ?>
                <h1>Tambah Karyawan</h1>
                <hr>
                <!-- CONTENT -->
                <div class="container border border-secondary rounded">
                    <b>
                        <form class="mt-3" action="<?= base_url() ?>/adminMasterData/tambah" method="post">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Id Karyawan</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control border border-secondary" readonly name="id" id="id" value='<?= $id ?>'>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control border border-secondary" name="name" id="name" placeholder="nama karyawan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control border border-secondary" name="username" id="username">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">TTL</label>
                                <div class="col-sm-2 col-form-label input-group">
                                    <input type="text" class="form-control datepicker text-center border border-secondary" name="ttl" id="ttl">
                                    <div class="input-group-addon ml-3">
                                        <i class="fa fa-calendar fa-2x" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control border border-secondary" name="phone" id="phone" placeholder="no telp">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Position</label>
                                <div class="col-sm-2">
                                    <select class="form-control border border-secondary" name="position" id="position">
                                        <option value="admina">Admin A</option>
                                        <option value="adminb">Admin B</option>
                                        <option value="adminc">Admin C</option>
                                        <option value="admind">Admin D</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Office</label>
                                <div class="col-sm-2">
                                    <select class="form-control border border-secondary" name="office" id="office">
                                        <option value="office-a">Office A</option>
                                        <option value="office-b">Office B</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Start Date</label>
                                <div class="col-sm-2 col-form-label input-group">
                                    <input type="text" class="form-control datepicker text-center border border-secondary" name="startdate" id="startdate">
                                    <div class="input-group-addon ml-3">
                                        <i class="fa fa-calendar fa-2x" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Salary</label>
                                <div class="col-sm-2 col-form-label input-group">
                                    <div class="input-group-addon">
                                        RP.
                                    </div>
                                    <input type="text" class="form-control border border-secondary ml-2" name="salary" id="salary">
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-2">
                                <button type="submit" class="btn btn-primary" onclick="Save()">Save</button>
                            </div>
                        </form>
                    </b>
                    <hr>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url('js/sideBar.js') ?>"></script>

    <script type="text/javascript">
        function DatePicker(dateKey) {
            $(function() {
                $(dateKey).datepicker({
                    format: 'yyyy-mm-dd',
                    autoclose: true,
                    todayHighlight: true,
                });
            });
        }

        function Save() {
            swal({
                title: "Success!",
                text: "Anda telah berhasil menambahkan data karyawan",
                icon: "success",
                button: "Ok",
            })
        }

        DatePicker(".datepicker");
    </script>
</body>

</html>