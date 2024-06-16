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
            <h1>แก้ไขรูปธรรมเนียบสภานักเรียน</h1>
            <?php

            $id = 1;

            require_once "../config/conn.php";

            $sql = 'SELECT * FROM studentcouncil WHERE id = :id';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['id' => $id]);

            // สำหรับการดึงข้อมูลแถวเดียว
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            ?>
            <div class="p-5">
                <img src="../img/post/<?php echo $data['img'] ?>" class="w-100 rounded" id="preview" alt="">

                <form action="./process/save-studentc.php" method="post" enctype="multipart/form-data">

                    <input type="text" name="project" value="<?php echo $data['id'] ?>" class="d-none">
                    <input type="file" class="form-control w-100 mt-3" name="img_file" onchange="previewImage(event)" accept="image/*">

                    <input type="submit" class="btn btn-primary w-100 mt-3" value="บันทึก">
                </form>
            </div>
        </div>


    </main>
    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../Framework/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
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

if (isset($_GET['b'])) {
    $status = $_GET['b'];

    if ($status == "success") {
        echo '<script>
        Swal.fire({
            title: "บันทึกสำเร็จ",
            text: "ขอบคุณน่ะที่เพิ่มอัพแบนเนอร์ใหม่",
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