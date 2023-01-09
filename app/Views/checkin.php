<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Check-In Page</title>
</head>

<body>
    <?php


    $targetID = "null";
    $targetID = strval($current_id);

    /*foreach ($users as $user) {
    $io = $user['id'];
    echo ("<script>console.log('<?= $io ?>' + '<?= $current_id ?>')</script>");
    if ($user['id'] === $current_id) {
        foreach ($data_karyawan as $karyawan) {
            if ($karyawan['email'] === [$user['email']]) {
                $targetID = $karyawan['id'];
            }
        }
    }
}*/

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
                            <a class="dropdown-item" href="/logout">Log Out</a>
                        </div>
                    </li>
                </ul>
                <b><?= $userName ?></b>
            </div>
        </div>
    </nav>
    <p></p>
    <div class="container mt-10">
        <div class="row">
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
    </div>
</body>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- Optional JavaScript -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script>

<script>
    var resultContainer = document.getElementById('qr-reader-results');
    var lastResult, countResults = 0;
    var homePageLink = "http://localhost:8080/home";
    var latitude = 0;
    var longitude = 0;

    const date = new Date();

    let dayName = getDayName(date.getDay());
    let day = formatedNumber(date.getDate());
    let month = formatedNumber(date.getMonth() + 1);
    let year = formatedNumber(date.getFullYear());

    function getDayName(day) {
        let dayName = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"][day];
        return dayName;
    }

    var userId = '<?= $targetID ?>';
    let currentDate = `${year}-${month}-${day}`;
    var isNear = false;

    function onScanSuccess(decodedText, decodedResult) {

        if (!isNear) {
            swal({
                title: "Warning!",
                text: "Anda tidak berada di area scanner",
                icon: "warning",
                button: "Refresh",
                dangerMode: true,
            }).then(function() {
                window.open("/checkin", "_self");
            });
        }

        if (decodedText !== lastResult) {
            ++countResults;
            lastResult = decodedText;

            // Handle on success condition with the decoded message.
            console.log(`Scan result ${decodedText}`, decodedResult);

            if (decodedText.indexOf('<?= $setting[0]['scanner_link'] ?>') > -1) {
                swal({
                    title: "Success!",
                    text: "Anda telah berhasil melakukan absen",
                    icon: "success",
                    button: "Ok",
                }).then(function() {
                    window.open("/user/checkin/" + userId + "/" + currentDate, "_self");
                });

                html5QrcodeScanner.clear();
            } else {
                swal({
                    title: "Warning!",
                    text: "Wrong QR Code!",
                    icon: "warning",
                    button: "Re Scanning",
                    dangerMode: true,
                });
            }
        }
    }

    function checkIsNear(curLongitude, curlatitude) {
        var minLongtidute = curLongitude - 2;
        var maxLongtitude = curLongitude + 2;
        var minLatitude = curlatitude - 2;
        var maxLatitude = curlatitude + 2;

        var isNearLatitude = false;
        var isNearLongitude = false;

        if ((minLatitude < latitude) && (maxLatitude > latitude)) {
            isNearLatitude = true;
        }

        if ((minLongtidute < longitude) && (maxLongtitude > longitude)) {
            isNearLongitude = true;
        }

        isNear = isNearLatitude && isNearLongitude;
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

    function getLocation() {
        if (!navigator.geolocation) {
            console.log('Geolocation API not supported by this browser.');
        } else {
            console.log('Checking location...');
            navigator.geolocation.getCurrentPosition(success, error);
        }
    }

    function success(position) {
        console.log(position);
        console.log('Latitude:', position.coords.latitude);
        console.log('Longitude:', position.coords.longitude);
        latitude = position.coords.latitude;
        longitude = position.coords.longitude;
        checkIsNear(<?= $setting[0]['longitude'] ?>, <?= $setting[0]['latitude'] ?>);
        CheckIsNear();
    }

    function error() {
        console.log('Geolocation error!');
    }

    function formatedNumber(n) {
        return n > 9 ? "" + n : "0" + n;
    }

    let currentDateFormat = `${year}-${month}-${day}`;

    function CheckInChecker(dateTarget) {
        console.log("MASUK " + dateTarget + " " + currentDateFormat);
        if (dateTarget == currentDateFormat) {
            swal({
                title: "Warning!",
                text: "Anda telah mengisi kehadiran hari ini",
                icon: "warning",
                button: "Back",
                dangerMode: true,
            }).then(function() {
                window.open("/home", "_self");
            });
        }
    }

    function CheckIsNear() {
        if (isNear) {
            console.log("You Are In Scanner Area");
        } else {

            console.log("You Are Far From Scanner Area");
        }
    }

    getLocation();
</script>

<?php

$targetId = "adm01";

foreach ($absensi as $absen) {
    if ($absen['id_karyawan'] === $targetId) {
        echo ("<script>CheckInChecker('" . $absen['date'] . "')</script>");
    }
}
?>

</html>