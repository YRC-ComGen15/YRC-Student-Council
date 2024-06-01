<?php

ob_start();
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ./login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - SCA admin</title>

    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">

    <link rel="stylesheet" href="../Framework/bootstrap/css/bootstrap.min.css">

    <!-- css -->
    <link rel="stylesheet" href="../asset/css/index.css">
    <link rel="stylesheet" href="./css/main.css">

    <!-- icon -->
    <link rel="stylesheet" href="../Framework/fontawsome/css/all.css">
    <script src="../Framework/fontawsome/js/all.js"></script>
</head>

<body>
    <header>
        <?php include_once "./header.php"; ?>
    </header>
    <main>
        <div class="container mt-5">
            <h1>Dashboard</h1>
            <div class="box p-5">
                <div class="row jusify-centent-center">
                    <div class="col-12 col-lg-5 box py-5 d-flex m-2">
                        <div class="d-block w-100">
                            <h3 class="m-3">จำนวนคนเข้าชมเว็บไซต์</h3>
                            <p class="mx-3">อัพเดทล่าสุดเมื่อ 23/5/2024</p>
                        </div>
                        <div class="d-flex w-100">
                            <h1 class="m-auto text-center ">100</h1>
                        </div>

                    </div>
                    <div class="col-12 col-lg-5 box py-5 d-flex m-2">
                        <div class="d-block w-100">
                            <h3 class="m-3">จำนวนคนเข้าชมเว็บไซต์</h3>
                            <p class="mx-3">อัพเดทล่าสุดเมื่อ 23/5/2024</p>
                        </div>
                        <div class="d-flex w-100">
                            <h1 class="m-auto text-center ">100</h1>
                        </div>

                    </div>
                    <div class="col-12 p-5 box">
                        <canvas id="viewerChart">/canvas>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../Framework/bootstrap/js/bootstrap.bundle.js"></script>

    <script>
        const ctx = document.getElementById('viewerChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['อาทิตย์','จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
                datasets: [{
                    label: 'จำนวนการเข้าชม',
                    data: [12, 19, 3, 5, 2, 3, 5],
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
    </script>
</body>

</html>