<?php

ob_start();
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ./login.php");
}

$name = $_SESSION['name'];

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
    $sql_month = "SELECT DATE_FORMAT(visit_date, '%M %Y') as month_year, SUM(visit_count) as total_visits FROM visitors GROUP BY month_year ORDER BY visit_date";
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
</head>

<body>
    <header>
        <?php include_once "./header.php"; ?>
    </header>
    <main>
        <div class="container mt-5">
            <h1>ตั้งค่าบัญชีสภานักเรียนของฉัน</h1>
            <div class="box p-5">
                <div class="row jusify-centent-center">
                    <div class="col-12 col-lg-12 box py-5 d-flex m-2">
                        <div class="d-block w-100">
                            <h3 class="m-3"><?= $name ?></h3>
                            <h5 class="mx-3"><b class="h4">ฝ่าย :</b> <?= $_SESSION['role'] ?> <b class="h4">โครงการ :</b> <?= $_SESSION['project'] ?></h5>
                        </div>
                        <div class="d-flex w-100">
                            <img src="../img/logo.png" class="m-auto" width="120" height="120" alt="">
                        </div>
                    </div>

                    <div class="col-12 col-lg-12 box py-5 d-flex m-2">
                        <div class="d-block w-100">

                            <?php

                            // นำข้อมูลใน mysql ที่เป็นข้อมูลของตัวเองมาแสดง PDO
                            $sql = "SELECT * FROM admin WHERE id = :id";
                            $stmt = $pdo->prepare($sql);
                            $stmt->bindParam(':id', $_SESSION['UserID'], PDO::PARAM_STR);
                            $stmt->execute();
                            $user = $stmt->fetch(PDO::FETCH_ASSOC);

                            // นำข้อมูล password ออกมา
                            $password = $user['password'];
                            $name = $user['name'];

                            ?>

                            <h2 class="m-3">ตั้งค่าบัญชีของฉัน</h2>
                            <form action="./process/save-profile.php" method="post" class="m-3">
                                <h5>ชื่อ</h5>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="name" value="<?= $name ?>">
                                </div>
                                <h5 class="mt-3">รหัสผ่าน</h5>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password" id="password" value="<?= $password ?>">
                                </div>
                                <div class="form-check mt-2">
                                    <input type="checkbox" class="form-check-input" id="showPassword" onclick="togglePassword()">
                                    <label class="form-check-label" for="showPassword">แสดงรหัสผ่าน</label>
                                </div>

                                <button class="btn btn-outline-success w-100 mt-3">บันทึก</button>
                            </form>
                        </div>

                    </div>

                    <button id="resetButton" class="btn btn-outline-danger mt-3 ">Logout</button>

                </div>
            </div>

        </div>
    </main>

    <!-- script -->
    <script src="../Framework/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function togglePassword() {
            var passwordInput = document.getElementById("password");
            var checkbox = document.getElementById("showPassword");

            if (checkbox.checked) {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>
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