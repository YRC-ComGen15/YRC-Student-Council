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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <header>
        <?php include_once "./header.php"; ?>
    </header>

    <main>
        <div class="mt-5 container">
            <h1><b><i class="fa-solid fa-bullhorn"></i> เพิ่มไฟล์</b></h1>

            <form action="./process/add-project.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">

                <h3 class="mt-3">ชื่อโครงการ</h3>
                <input type="text" class="form-control w-100" name="title" id="title" placeholder="ชื่อโครงการ" required>

                <h3 class="mt-3">ลิ้งโครงการ</h3>
                <input type="url" class="form-control w-100" name="link" id="link" placeholder="ต้องมี https://" required>

                <h3 class="mt-3">ไฟล์</h3>
                <input type="file" class="form-control w-100" name="img_file" id="img_file" accept="image/*" onchange="previewImage(event)" required>

                <!-- พรีวิวภาพ -->
                <img id="preview" src="#" alt="ตัวอย่างภาพ" style="max-width: 100%; margin-top: 10px; display: none;">

                <input type="submit" class="btn btn-success mt-3 w-100" value="ตกลง">
            </form>
        </div>
    </main>

    <script src="../Framework/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../Framework/jq/jq.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        $("#table").DataTable();

        // พรีวิวภาพก่อนอัปโหลด
        function previewImage(event) {
            var preview = document.getElementById('preview');
            var file = event.target.files[0];

            if (file) {
                var reader = new FileReader();
                reader.onload = function() {
                    preview.src = reader.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        }

        // ตรวจสอบฟอร์มก่อนส่ง
        function validateForm() {
            var title = document.getElementById("title").value.trim();
            var link = document.getElementById("link").value.trim();
            var file = document.getElementById("img_file").value.trim();

            if (title === "" || link === "" || file === "") {
                Swal.fire({
                    title: "กรุณากรอกข้อมูลให้ครบ!",
                    text: "ต้องกรอกชื่อโครงการ, ลิ้งโครงการ และแนบไฟล์ภาพ",
                    icon: "warning"
                });
                return false;
            }

            return true;
        }
    </script>

</body>

</html>

<?php
// แจ้งเตือนสถานะการเพิ่มไฟล์
if (isset($_GET['a'])) {
    $status = $_GET['a'];

    if ($status == "success") {
        echo '<script>
        Swal.fire({
            title: "บันทึกสำเร็จ!",
            text: "ขอบคุณที่เพิ่มข่าว",
            icon: "success"
        }).then(() => {
            window.location.href = "./index.php";
        });
        </script>';
    } elseif ($status == "error") {
        echo '<script>
        Swal.fire({
            title: "บันทึกไม่สำเร็จ!",
            text: "เกิดข้อผิดพลาด โปรดลองใหม่",
            icon: "error"
        });
        </script>';
    }
}
?>