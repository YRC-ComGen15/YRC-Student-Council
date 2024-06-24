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

    <link rel="shortcut icon" href="../../img/logo.png" type="image/x-icon">

    <link rel="stylesheet" href="../../Framework/bootstrap/css/bootstrap.min.css">

    <!-- css -->
    <link rel="stylesheet" href="../../asset/css/index.css">
    <link rel="stylesheet" href="../css/main.css">

    <!-- icon -->
    <link rel="stylesheet" href="../../Framework/fontawsome/css/all.css">
    <script src="../../Framework/fontawsome/js/all.js"></script>
</head>

<body>
    <header>
        <?php include_once "./header.php"; ?>
    </header>

    <main>
        <div class="container mt-5">
            <h1>Banner โครงการ LearnTogether</h1>
            <?php

            $id = 1;

            require_once "../../config/conn.php";

            $sql = 'SELECT * FROM banner WHERE id = :id';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['id' => $id]);

            // สำหรับการดึงข้อมูลแถวเดียว
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            ?>
            <div class="p-5">
                <img src="../../img/banner/<?php echo $data['files'] ?>" class="w-100 rounded" id="preview" alt="">

                <form action="../process/save-banner.php" method="post" enctype="multipart/form-data">

                    <input type="text" name="project" value="<?php echo $data['id'] ?>" class="d-none">
                    <input type="file" class="form-control w-100 mt-3" name="img_file" onchange="previewImage(event)" accept="image/*">

                    <input type="submit" class="btn btn-primary w-100 mt-3" value="บันทึก">
                </form>
            </div>

            <!-- catagory -->
            <div class="mt-5 container">
                <h1><b><i class="fa-solid fa-bullhorn"></i> หมวดหมู่หนังสือ</b></h1>
                <a href="./add-catagory.php" class="btn btn-outline-success mt-3">เพิ่มหมวดหมู่หนังสือ +</a>

                <div class="table-responsive mt-4">
                    <table id="table" class="table table-row-bordered gy-5">
                        <thead>
                            <tr class="fw-semibold fs-6 text-muted">
                                <th>id</th>
                                <th>category</th>

                                <th>option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM learn_category ORDER BY id DESC";

                            $sql = "SELECT * FROM learn_category";
                            $stmt = $pdo->query($sql);
                            ?>
                            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                                <tr>
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo $row['category'] ?></td>
                                    <td class="d-flex">
                                        <a href="./edit-category.php?id=<?php echo $row['id'] ?>    " class="btn btn-primary m-auto"><i class="fa-solid fa-pencil"></i> edit</a>
                                        <a href="./process/del-category.php?id=<?php echo $row['id'] ?>" class="btn btn-danger m-auto"><i class="fa-solid fa-trash"></i> delete</a>
                                    </td>
                                </tr>
                            <?php } ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>id</th>
                                <th>category</th>
                                <th>option</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <<<<<<< HEAD <!-- bookshelf -->
                <div class="mt-5 container">
                    <h1><b><i class="fa-solid fa-bullhorn"></i> รายการหนังสือทั้งหมด</b></h1>
                    <a href="./add-catagory.php" class="btn btn-outline-success mt-3">เพิ่มหมวดหมู่หนังสือ +</a>

                    <div class="table-responsive mt-4">
                        <table id="table" class="table table-row-bordered gy-5">
                            <thead>
                                <tr class="fw-semibold fs-6 text-muted">
                                    <th>id</th>
                                    <th>title</th>
                                    <th>category</th>

                                    <th>img</th>
                                    <th>date</th>
                                    <th>name</th>
                                    <th>status</th>
                                    <th>option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM learn_booksharing ORDER BY id DESC";
                                $stmt = $pdo->query($sql);
                                ?>
                                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <tr>
                                        <td><?php echo $row['id'] ?></td>
                                        <td><?php echo $row['title'] ?></td>
                                        <td><?php echo $row['category'] ?></td>

                                        <td>
                                            <img src="../../LearnTogether/BookCover/<?php echo $row['img'] ?>" class="w-100" alt="">
                                        </td>
                                        <td><?php echo $row['date'] ?></td>
                                        <td><?php echo $row['name'] ?></td>

                                        <?php

                                        if ($row['status'] == "active") {
                                            echo "<td class='text-success'>ยืนยันแล้ว</td>";
                                        } else {
                                            echo "<td class='text-danger'>ยังไม่ได้ยืนยัน</td>";
                                        }

                                        ?>

                                        <td class="d-flex">
                                            <a href="./process/submit-book.php?id=<?php echo $row['id'] ?>" class="btn btn-success m-auto"><i class="fa-solid fa-check"></i> ยืนยัน</a>
                                            <a href="./process/del-book.php?id=<?php echo $row['id'] ?>" class="btn btn-danger m-auto"><i class="fa-solid fa-xmark"></i> ปฎิเสธ</a>
                                        </td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>id</th>
                                    <th>title</th>
                                    <th>category</th>

                                    <th>img</th>
                                    <th>date</th>
                                    <th>name</th>
                                    <th>status</th>
                                    <th>option</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                =======
                >>>>>>> 83fe3ff260bc86b86a1876caf855c95400a5d6da
        </div>


    </main>
    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../../Framework/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $("#table").DataTable({

        });
    </script>
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

if (isset($_GET['a'])) {
    $id = $_GET['a'];
    if ($id == "success") {
        echo '<script>Swal.fire({
  title: "Success",
  text: "บันทึกแล้วน่ะะ",
  icon: "success"
});</script>';
    } else if ($id == "error") {
        echo '<script>Swal.fire({
            title: "Error",
            text: "ไม่สามารถบันทึกได้",
            icon: "error"
          });</script>';
    }
}

?>