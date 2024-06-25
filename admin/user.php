<?php

ob_start();
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ./login.php");
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

    <!-- css -->
    <link rel="stylesheet" href="../asset/css/index.css">
    <link rel="stylesheet" href="./css/main.css">

    <!-- icon -->
    <link rel="stylesheet" href="../Framework/fontawsome/css/all.css">
    <script src="../Framework/fontawsome/js/all.js"></script>

    <!-- datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
</head>

<body>
    <header>
        <?php include_once "./header.php"; ?>
    </header>
    <main>
        <div class="mt-5 container">
            <h1><b><i class="fa-solid fa-bullhorn"></i> ระบบจัดการผู้ใช้</b></h1>
            <a href="./add-user.php" class="btn btn-outline-success mt-3">เพิ่มผู้ใช้ +</a>

            <div class="table-responsive mt-4">
                <table id="table" class="table table-row-bordered gy-5">
                    <thead>
                        <tr class="fw-semibold fs-6 text-muted">
                            <th>id</th>
                            <th>ชื่อผู้ใช้</th>
                            <th>รหัสผ่าน</th>
                            <th>ชื่อ นามสกุล</th>
                            <th>ฝ่าย</th>
                            <th>โครงการ</th>
                            <th>option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM admin";
                        $stmt = $pdo->query($sql);
                        ?>
                        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['username'] ?></td>
                                <td><?php echo $row['password'] ?></td>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['role'] ?></td>
                                <td><?php echo $row['project'] ?></td>
                                <td class="d-flex">
                                    
                                    <a href="./process/del-user.php?id=<?php echo $row['id'] ?>" class="btn btn-danger m-auto"><i class="fa-solid fa-trash"></i> delete</a>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>id</th>
                            <th>ชื่อผู้ใช้</th>
                            <th>รหัสผ่าน</th>
                            <th>ชื่อ นามสกุล</th>
                            <th>ฝ่าย</th>
                            <th>โครงการ</th>
                            <th>option</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </main>
    <script src="../Framework/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../Framework/jq/jq.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $("#table").DataTable({

        });
    </script>
</body>

</html>

<?php

if (isset($_GET['a'])) {
    $status = $_GET['a'];

    if ($status == "success") {
        echo '<script>
        Swal.fire({
            title: "บันทึกสำเร็จ",
            text: "ขอบคุณน่ะที่เพิ่มข่าวให้",
            icon: "success"
          });
        </script>';
    }

    if ($status == "error") {
        echo '<script>
        Swal.fire({
            title: "บันทึกไม่สำเร็จ",
            text: "ลองดูใหม่น่ะ อาจจะมีบางอย่างผิดพลาด",
            icon: "error"
          });
        </script>';
    }
}

if (isset($_GET['d'])) {
    $status = $_GET['d'];

    if ($status == "success") {
        echo '<script>
        Swal.fire({
            title: "ลบสำเร็จ",
            text: "ลบข่าวแล้วน่ะะ",
            icon: "success"
          });
        </script>';
    }

    if ($status == "error") {
        echo '<script>
        Swal.fire({
            title: "ลบไม่สำเร็จ",
            text: "อาว..",
            icon: "error"
          });
        </script>';
    }
}
?>