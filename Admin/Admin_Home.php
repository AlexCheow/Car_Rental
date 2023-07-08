<?php require('Admin_Header.php'); ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            font-family: system-ui;
            background: #f8f9fa;
            color: black;
            text-align: center;
        }

        .welcome {
            font-size: 24px;
            font-weight: bold;
            margin-top: 100px;
        }

        #clock {
            font-size: 48px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Welcome, Admin</h2>
                    <div id="clock"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function currentTime() {
        let date = new Date();
        let hh = date.getHours();
        let mm = date.getMinutes();
        let ss = date.getSeconds();
        let session = "AM";

        if (hh === 0) {
            hh = 12;
        }
        if (hh > 12) {
            hh = hh - 12;
            session = "PM";
        }

        hh = (hh < 10) ? "0" + hh : hh;
        mm = (mm < 10) ? "0" + mm : mm;
        ss = (ss < 10) ? "0" + ss : ss;

        let time = hh + ":" + mm + ":" + ss + " " + session;

        document.getElementById("clock").innerText = time;
        let t = setTimeout(function () {
            currentTime()
        }, 1000);
    }

    currentTime();
</script>

</body>
</html>
