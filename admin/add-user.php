<?php

ob_start();
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ./login.php");
    exit(); // Prevent further execution
}

require_once "../config/conn.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - SCA admin</title>

    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../Framework/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../asset/css/index.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="../Framework/fontawsome/css/all.css">
    <script src="../Framework/fontawsome/js/all.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> <!-- Ensure SweetAlert is included -->
</head>

<body>
    <header>
        <?php include_once "./header.php"; ?>
    </header>
    <main>
        <div class="mt-5 container">
            <h1><b><i class="fa-solid fa-bullhorn"></i> เพิ่มผู้ใช้</b></h1>

            <form action="" method="post" enctype="multipart/form-data">
                <h3 class="mt-3">ชื่อผู้ใช้</h3>
                <input type="text" class="form-control w-100" placeholder="username" name="username">

                <h3 class="mt-3">รหัสผ่าน</h3>
                <input type="text" name="password" class="form-control w-100" placeholder="password"></input>

                <h3 class="mt-3">ชื่อนามสกุล</h3>
                <input type="text" class="form-control w-100" name="name" placeholder="name">

                <h3 class="mt-3">ฝ่าย</h3>
                <input type="text" class="form-control w-100" name="role" placeholder="ฝ่าย">

                <h3 class="mt-3">โครงการ</h3>
                <input type="text" class="form-control w-100" name="project" placeholder="โครงการ">

                <input type="submit" class="btn btn-success mt-3 w-100" name="submit" value="ตกลง">
            </form>
        </div>
    </main>
    <script src="../Framework/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../Framework/jq/jq.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $("#table").DataTable();
    </script>
</body>

</html>

<?php

if (isset($_GET['a'])) {
    $status = $_GET['a'];

    if ($status == "success") {
        header("Location : ../user.php");
    }

    if ($status == "error") {
        header("Location : ../user.php");
    }
}


if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $role = $_POST['role'];
    $project = $_POST['project'];

    $stmt = $pdo->prepare("INSERT INTO admin (username, role, password, name, project) VALUES (:username, :role, :password, :name, :project)");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->bindParam(':role', $role, PDO::PARAM_STR);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':project', $project, PDO::PARAM_STR);
    $result = $stmt->execute();

    if ($result) {
        echo '<script>Swal.fire({
  title: "Success
  text: "บันทึกสำเร็จ",
  icon: "success"
});</script>';
    } else {
        echo '<script>Swal.fire({
            title: "Error
            text: "บันทึกไม่สำเร็จ",
            icon: "error"
          });</script>';
    }
}

?>