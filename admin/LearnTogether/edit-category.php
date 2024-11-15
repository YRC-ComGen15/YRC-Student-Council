<?php

ob_start();
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ./login.php");
    exit(); // Prevent further execution
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("Location: ./index.php");
}

require_once "../../config/conn.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - SCA admin</title>

    <link rel="shortcut icon" href="../../img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../../Framework/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../asset/css/index.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../../Framework/fontawsome/css/all.css">
    <script src="../../Framework/fontawsome/js/all.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> <!-- Ensure SweetAlert is included -->
</head>

<body>
    <header>
        <?php include_once "./header.php"; ?>
    </header>
    <main>
        <div class="mt-5 container">
            <?php

            $sql = 'SELECT * FROM learn_category WHERE id = :id';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['id' => $id]);

            // สำหรับการดึงข้อมูลแถวเดียว
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            ?>
            <h1><b><i class="fa-solid fa-bullhorn"></i> แก้ไขชื่อหมวดหมู่</b></h1>

<<<<<<< HEAD
            <form action="./process/edit-category.php" name="form" method="post" enctype="multipart/form-data">
=======
            <form action="./process/edit-announce.php" name="form" method="post" enctype="multipart/form-data">
>>>>>>> 83fe3ff260bc86b86a1876caf855c95400a5d6da
                <h3 class="mt-3">id</h3>
                <input type="text" class="form-control w-100" name="id" readonly value="<?php echo $data['id'] ?>">

                <h3 class="mt-3">ชื่อหมวดหมู่</h3>
                <input type="text" class="form-control w-100" placeholder="ชื่อหมวดหมู่" name="category" value="<?php echo $data['category'] ?>">

                <input type="submit" class="btn btn-success mt-3 w-100" value="ตกลง">
            </form>
        </div>
    </main>
    <script src="../../Framework/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../../Framework/jq/jq.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $("#table").DataTable();

        function previewImage(event) {
            var preview = document.getElementById('preview');
            var file = event.target.files[0];
            var reader = new FileReader();

            reader.onload = function() {
                preview.src = reader.result;
                preview.style.display = 'block';
            }

            if (file) {
                reader.readAsDataURL(file);
            }
        }
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

?>