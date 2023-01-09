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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

    <title>Home Page</title>
</head>

<body>
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
                            <a class="dropdown-item" href="/logout">Log Out</a>
                        </div>
                    </li>
                </ul>
                <b>Your Name asdasdadssddsa</b>
            </div>
        </div>
    </nav>
    <!-- CONTENT -->
    <div class="container border border-secondary rounded mt-3">
        <h2>Form Request Annual Leave</h2>
        <b>
            <form class="mt-3" action="<?= base_url() ?>/reqAnnualLeave/send" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Requester</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control border border-secondary" readonly name="requester" id="requester" value='<?= $userId ?>'>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-3">
                        <?php
                        $name = "null";

                        foreach ($data_karyawan as $karyawan) {
                            if ($karyawan['id'] === $userId) {
                                $name = $karyawan['name'];
                            }
                        }
                        ?>
                        <input type="text" class="form-control border border-secondary" readonly name="name" id="name" value='<?= $name ?>'>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Izin Pada Tanggal</label>
                    <div class="col-sm-2 col-form-label input-group">
                        <input type="text" class="form-control datepicker text-center border border-secondary" name="tanggal" id="tanggal">
                        <div class="input-group-addon ml-3">
                            <i class="fa fa-calendar fa-2x" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tujuan Izin</label>
                    <div class="col-sm-5 col-form-label input-group">
                        <textarea class="form-control border border-secondary" name="reason" id="reason" rows="3"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Lampiran</label>
                    <div class="col-sm-3 col-form-label input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="lampiran" name="lampiran">
                            <label class="custom-file-label" for="lampiran">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-2">
                    <button type="submit" class="btn btn-primary" onclick="Request()">Request</button>
                </div>
            </form>
        </b>
        <hr>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <script>
        function DatePicker(dateKey) {
            $(function() {
                $(dateKey).datepicker({
                    format: 'yyyy-mm-dd',
                    autoclose: true,
                    todayHighlight: true,
                });
            });
        }

        DatePicker(".datepicker");

        function Request() {
            swal({
                title: "Success!",
                text: "Izin Telah di Request",
                icon: "success",
            })

            window.open("/reqAnnualLeave/send", "_self");
        }
    </script>
</body>

</html>