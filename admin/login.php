<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin - SCA</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">

    <!-- adminLTE -->
    <link rel="stylesheet" href="../Framework/bootstrap/css/bootstrap.min.css">

    <!-- css -->
    <link rel="stylesheet" href="../asset/css/index.css">

    <!-- login -->
    <link rel="stylesheet" href="./css/login.css">

    <!-- alert -->
    <link rel="stylesheet" href="../Framework/sweetalert/sweetalert2.css">
</head>

<body>

    <div class="container mt-5">
        <div class="bg-light box ">
            <div class="row">
                <div class="col-6 d-none d-lg-block">
                    <div class="carousel-inner h-100">
                        <img src="./img/login_asset.jpg" class="img-fluid h-100" alt="banner">
                    </div>
                </div>
                <div class="col-12 col-lg-6 d-block p-5">
                    <h1 class="text-center">ล็อกอินสำหรับสภานักเรียน</h1>
                    <form action="./process/save_login.php" method="post">
                        <div class="mt-5">
                            <span class="mt-3 fs-5">Username</span>
                            <input type="text" class="form-control mt-0" name="username" placeholder="ชื่อผู้ใช้">
                        </div>

                        <div class="mt-3">
                            <span class="mt-5 fs-5">Password</span>
                            <input type="password" class="form-control mt-0" name="password" placeholder="รหัสผ่าน    ">
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary w-100">เข้าสู่ระบบ</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- adminLTE -->
    <script src="../Framework/bootstrap/js/bootstrap.bundle.js"></script>

    <!-- sweetalert -->
    <script src="../Framework/sweetalert/sweetalert2.all.js"></script>
</body>

</html>

<?php

if (isset($_GET['a'])) {
    $status = $_GET['a'];

    if ($status == 'error') {
        echo '<script>Swal.fire({
  title: "Error",
  text: "ชื่อผู้ใช้หรือรหัสผ่านผิดพลาด",
  icon: "error"
});</script>';
    }
}

?>