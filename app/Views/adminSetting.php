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
                    </li>
                    <li>
                        <a href="/adminAnnualLeaved"><span class="fa fa-briefcase mr-3"></span> Annual Leave Requested</a>
                    </li>
                    <li>
                        <a href="/adminHistoryAbsen"><span class="fa fa-sticky-note mr-3"></span> History Absensi</a>
                    </li>
                    <li class="active">
                        <a href="/adminSetting"><span class="fa fa-paper-plane mr-3"></span> Setting</a>
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
                <h1>Setting</h1>
                <hr>
            </div>
            <!-- CONTENT -->
            <div class="container border border-secondary rounded">
                <b>
                    <form class="mt-3" action="<?= base_url() ?>/adminSetting/Update" method="post">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Location</label>
                            <div class="col-sm-3">
                                Latitude
                                <input type="text" class="form-control border border-secondary" readonly name="latitude" id="latitude" value="<?= $setting[0]['latitude'] ?>"><br>
                                Longitude
                                <input type="text" class="form-control border border-secondary" readonly name="longitude" id="longitude" value="<?= $setting[0]['longitude'] ?>"><br>
                                <button type="button" class="btn btn-primary" onclick="SetLocation()">Sesuaikan</button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Barcode</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control border border-secondary" readonly name="scanner_link" id="scanner_link" value="<?= $setting[0]['scanner_link'] ?>"><br>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="IsBarcodeChange(false)">Test Barcode</button>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="IsBarcodeChange(true)">Change Barcode</button>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-2">
                            <button type="button" class="btn btn-info" onclick="Reload()">Reset</button>
                            <button type="submit" class="btn btn-primary ml-2" onclick="Save()">Save</button>
                        </div>
                    </form>
                </b>
                <hr>
            </div>
            <!-- Modal -->
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Scan the Barcode</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12" style="text-align: center;margin-bottom: 20px;">
                                <div id="qr-reader" style="width:100%">
                                    <div id="reader_scan_region" style="width: 100%; min-height: 100px; text-align: center;"><br>
                                        <img width="64" src="<?php echo base_url('images/phone.svg') ?>" style="opacity: 0.8;">
                                    </div>
                                    <div id="reader_dashboard" style="width: 100%;">
                                        <div id="reader__dashboard_section" style="width: 100%; padding: 10px 0px; text-align: left;">
                                            <div>
                                                <div id="reader__dashboard_section_csr" style="display: block;">
                                                    <div style="text-align: center;"><button id="html5-qrcode-button-camera-permission" class="html5-qrcode-element">Request Camera Permissions</button></div>
                                                </div>
                                                <div style="text-align: center; margin: auto auto 10px; width: 80%; max-width: 600px; border: 6px dashed rgb(235, 235, 235); padding: 10px; display: none;"><label for="html5-qrcode-private-filescan-input" style="display: inline-block;"><button id="html5-qrcode-button-file-selection" class="html5-qrcode-element">Choose Image - No image choosen</button><input id="html5-qrcode-private-filescan-input" class="html5-qrcode-element" type="file" accept="image/*" style="display: none;"></label>
                                                    <div style="font-weight: 400;">Or drop an image to scan</div>
                                                </div>
                                            </div>
                                            <div style="text-align: center;"><a id="html5-qrcode-anchor-scan-type-change" class="html5-qrcode-element" style="text-decoration: underline;">Scan an Image File</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="empty"></div>
                                <div id="qr-reader-results"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
    <script type="text/javascript" src="<?php echo base_url('js/multiselect.js') ?>"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script>

    <script type="text/javascript">
        function Reload() {
            location.reload();
        }

        var resultContainer = document.getElementById('qr-reader-results');
        var lastResult, countResults = 0;

        function onScanSuccess(decodedText, decodedResult) {
            ++countResults;

            // Handle on success condition with the decoded message.
            console.log(`Scan result ${decodedText}`, decodedResult);

            if (!isBarcodeChange) {
                if (document.getElementById("scanner_link").value === decodedText) {
                    swal({
                        title: "Success!",
                        text: "Barcode berhasil di scan",
                        icon: "success",
                        button: "Ok",
                    })
                } else {
                    swal({
                        title: "Warning!",
                        text: "Barcode Salah!",
                        icon: "warning",
                        button: "Ok",
                    })
                }
            } else {
                lastResult = decodedText;

                swal({
                    title: "Success!",
                    text: "Barcode berhasil di ubah",
                    icon: "success",
                    button: "Ok",
                })
            }

            if (isBarcodeChange) {
                document.getElementById("scanner_link").value = lastResult;
            }
        }

        function openTheScannerCamera() {
            var isMobile = window.orientation > 1;
            var alert = isMobile ? 'It is a mobile device' : 'It is not a mobile device';

            //Ganti jadi isMobile kalo udah fix
            if (!isMobile) {
                var html5QrcodeScanner = new Html5QrcodeScanner(
                    "qr-reader", {
                        fps: 10,
                        qrbox: 500
                    });

                html5QrcodeScanner.render(onScanSuccess);
                console.log("Opened");
            } else {
                swal({
                    title: "Warning!",
                    text: alert,
                    icon: "warning",
                    button: "Back",
                    dangerMode: true,
                }).then(function() {
                    window.location = homePageLink;
                });
            }
        }

        openTheScannerCamera();

        var isBarcodeChange = false;

        function IsBarcodeChange(isTrue) {
            isBarcodeChange = isTrue;
            console.log(isBarcodeChange);
        }

        var latitude;
        var longitude;

        function SetLocation() {
            if (!navigator.geolocation) {
                console.log('Geolocation API not supported by this browser.');
            } else {
                console.log('Checking location...');
                navigator.geolocation.getCurrentPosition(success, error);
            }
        }

        function success(position) {
            console.log(position);
            latitude = position.coords.latitude;
            longitude = position.coords.longitude;

            console.log('Latitude:', position.coords.latitude);
            console.log('Longitude:', position.coords.longitude);
            document.getElementById("latitude").value = latitude;
            document.getElementById("longitude").value = longitude;
        }

        function error() {
            console.log('Geolocation error!');

            swal({
                title: "Failed To Open!",
                text: "Pastikan Fitur Geolocation Menyala",
                icon: "success",
                button: "Ok",
            }).then(function() {
                window.open("/adminDashboard", "_self");
            });
        }

        function Save() {
            swal({
                title: "Update Setting!",
                text: "Setting Baru telah dibuat",
                icon: "success",
                button: "Ok",
            }).then(function() {
                window.open("/adminDashboard", "_self");
            });
        }
    </script>
</body>

</html>