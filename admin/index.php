<?php

ob_start();
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ./login.php");
}

if (!isset($_SESSION['name'])) {
    header("Location: ./login.php");
} else {
    $name = $_SESSION['name'];
}


// เริ่มทำการเชื่อมต่อฐานข้อมูล
require_once "../config/conn.php";

try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // ดึงข้อมูลจำนวนผู้เข้าชมตามวันในสัปดาห์
    $sql = "SELECT day_of_week, SUM(visit_count) as total_visits FROM visitors GROUP BY day_of_week ORDER BY FIELD(day_of_week, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday')";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $weekly_visits = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // ดึงข้อมูลจำนวนผู้เข้าชมตามเดือน
    $sql_month = "SELECT DATE_FORMAT(visit_date, '%M %Y') as month_year, SUM(visit_count) as total_visits FROM visitors GROUP BY DATE_FORMAT(visit_date, '%M %Y') ORDER BY MIN(visit_date)";
    $stmt_month = $pdo->prepare($sql_month);
    $stmt_month->execute();
    $monthly_visits = $stmt_month->fetchAll(PDO::FETCH_ASSOC);

    // ดึงข้อมูลจำนวนผู้เข้าชมทั้งหมด
    $sql_total = "SELECT SUM(visit_count) as total_visits FROM visitors";
    $stmt_total = $pdo->prepare($sql_total);
    $stmt_total->execute();
    $total_visits = $stmt_total->fetch(PDO::FETCH_ASSOC)['total_visits'];
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
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

    <!-- TailWindCss -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <header>
        <?php include_once "./header.php"; ?>
    </header>
    <main>
        <div class="container mt-5">
            <h1><b>สวัสดีคุณ</b> <?php echo $name ?></h1>
            <div class="box p-5">
                <div class="row jusify-centent-center">
                    <div class="col-12 col-lg-12 box py-5 d-flex m-2">
                        <div class="d-block w-100">
                            <h3 class="m-3">จำนวนคนเข้าชมเว็บไซต์</h3>
                            <p class="mx-3">อัพเดทล่าสุดเมื่อ <?php echo date("j/n/Y"); ?></p>
                        </div>
                        <div class="d-flex w-100">
                            <h1 class="m-auto text-center "><?php echo $total_visits; ?></h1>
                        </div>
                    </div>

                    <div class="col-12 p-5 box mt-5">
                        <h3>จำนวนผู้เข้าชมตามวันในสัปดาห์</h3>
                        <canvas id="weeklyChart"></canvas>
                    </div>

                    <div class="col-12 p-5 box mt-5">
                        <h3>จำนวนผู้เข้าชมตามเดือน</h3>
                        <canvas id="monthlyChart"></canvas>
                    </div>
                    <button id="resetButton" class="btn btn-danger mt-3">Reset ข้อมูลทั้งหมด</button>

                </div>
            </div>
        </div>
    </main>

    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../Framework/bootstrap/js/bootstrap.bundle.js"></script>

    <script>
        // Data for weekly chart
        const weeklyLabels = <?php echo json_encode(array_column($weekly_visits, 'day_of_week')); ?>;
        const weeklyData = <?php echo json_encode(array_column($weekly_visits, 'total_visits')); ?>;

        const ctxWeekly = document.getElementById('weeklyChart').getContext('2d');
        new Chart(ctxWeekly, {
            type: 'bar',
            data: {
                labels: weeklyLabels,
                datasets: [{
                    label: 'จำนวนการเข้าชม (ต่อวันในสัปดาห์)',
                    data: weeklyData,
                    borderWidth: 1,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)'
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

        // Data for monthly chart
        const monthlyLabels = <?php echo json_encode(array_column($monthly_visits, 'month_year')); ?>;
        const monthlyData = <?php echo json_encode(array_column($monthly_visits, 'total_visits')); ?>;

        const ctxMonthly = document.getElementById('monthlyChart').getContext('2d');
        new Chart(ctxMonthly, {
            type: 'bar',
            data: {
                labels: monthlyLabels,
                datasets: [{
                    label: 'จำนวนการเข้าชม (ต่อเดือน)',
                    data: monthlyData,
                    borderWidth: 1,
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderColor: 'rgba(153, 102, 255, 1)'
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

    <script>
        document.getElementById('resetButton').addEventListener('click', function() {
            Swal.fire({
                title: 'คุณแน่ใจหรือไม่?',
                text: "คุณต้องการรีเซ็ตข้อมูลทั้งหมดหรือไม่?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ใช่, ลบข้อมูล!',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, redirect to a PHP script to handle data deletion
                    window.location.href = './reset_data.php';
                }
            });
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>

<?php

if (isset($_GET['a'])) {
    $status = $_GET['a'];

    if ($status == 'success') {
        echo '<script>Swal.fire({
  title: "Success",
  text: "ล็อกอินสำเร็จ",
  icon: "success"
});</script>';
    }
}

?>