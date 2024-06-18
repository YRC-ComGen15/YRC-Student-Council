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

    <main class="d-flex h-100 mt-2 p-3">
        <div class="m-auto justify-content-center">
            <div class="d-flex">

                <img src="../img/logo.png" class="w-50 m-auto" alt="">
            </div>
            <h1 class="text-center mt-3">ล็อกอินผู้ดูแลระบบ</h1>
            <form action="./process/save_login.php" method="post">
                <p>username</p>
                <input type="text" class="form-control" name="username" placeholder="username">
                <p class="mt-3">password</p>
                <input type="password" class="form-control" name="password" placeholder="password">

                <input type="submit" value="Submit" class="btn btn-primary w-100 mt-3">
            </form>
        </div>
    </main>

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