<?php

require_once "../config/conn.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YRC Sharing - Learntogether</title>

    <link rel="shortcut icon" href="../img/learn-logo.png" type="image/x-icon">

    <link rel="stylesheet" href="../Framework/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="./form.css">

    <link rel="stylesheet" href="../asset/css/index.css">
</head>

<body>
    <h1 class="text-center mt-5 pt-5"><b>YRC SHARING</b></h1>

    <div class="box p-3 mx-4 mt-3 my-5">
        <form action="./proccess/save_book.php" method="post" enctype="multipart/form-data">
            <h5><b>ชื่อหนังสือ</b></h5>
            <input type="text" placeholder="ชื่อหนังสือ" name="title" class="form-control">

            <h5 class="mt-3"><b>ปกหนังสือ</b></h5>
            <input type="file" onchange="previewImage(event)" name="img_file" accept="image/*" placeholder="ชื่อหนังสือ" class="form-control">

            <img alt="" class="w-100 mt-3" id="preview">

            <h5 class="mt-3"><b>เนื้อหาโดยย่อ</b></h5>
            <textarea class="form-control" name="decp" placeholder="รายละเอียด"></textarea>

            <h5 class="mt-3"><b>ประเภทหนังสือ</b></h5>
            <select name="category" class="form-control w-100 mt-3" id="category">
                <option value="0">เลือกประเภทหนังสือ</option>
                <?php
                $sql = "SELECT * FROM learn_category";
                $stmt = $pdo->query($sql);
                ?>
                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value="<?php echo $row['category'] ?>"><?php echo $row['category'] ?></option>
                <?php } ?>
            </select>

            <h5 class=mt-3><b>หนังสือ Google drive</b></h5>
            <input type="text" placeholder="https://drive.google.com" name="link" class="form-control">

            <input type="submit" class="mt-3 btn btn-success w-100" value="ส่ง">
        </form>
    </div>

    <script src="../Framework/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../Framework/jq/jq.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
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