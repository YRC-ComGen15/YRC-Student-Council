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
            <h1><b><i class="fa-solid fa-bullhorn"></i> แก้ไขเมนู</b></h1>

            <!-- <form action="post">
                <?php

                $id = 1;

                $sql = 'SELECT * FROM menu WHERE id = :id';
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['id' => $id]);

                // สำหรับการดึงข้อมูลแถวเดียว
                $data = $stmt->fetch(PDO::FETCH_ASSOC);

                ?>
                <h5 class="mt-3">สภานักเรียน</h5>
                <input type="text" class="form-control w-100" name="" value="<?php echo $data['link'] ?>">

                <?php

                $id = 2;

                $sql = 'SELECT * FROM menu WHERE id = :id';
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['id' => $id]);

                // สำหรับการดึงข้อมูลแถวเดียว
                $data = $stmt->fetch(PDO::FETCH_ASSOC);

                ?>
                <h5 class="mt-3">คู่มือนักเรียน</h5>
                <input type="text" class="form-control w-100" value="<?php echo $data['link'] ?>">

                <?php

                $id = 3;

                $sql = 'SELECT * FROM menu WHERE id = :id';
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['id' => $id]);

                // สำหรับการดึงข้อมูลแถวเดียว
                $data = $stmt->fetch(PDO::FETCH_ASSOC);

                ?>
                <h5 class="mt-3">กฏระเบียบ</h5>
                <input type="text" class="form-control w-100" value="<?php echo $data['link'] ?>">

                <?php

                $id = 4;

                $sql = 'SELECT * FROM menu WHERE id = :id';
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['id' => $id]);

                // สำหรับการดึงข้อมูลแถวเดียว
                $data = $stmt->fetch(PDO::FETCH_ASSOC);

                ?>
                <h5 class="mt-3">แผนที่โรงเรียน</h5>
                <input type="text" class="form-control w-100" value="<?php echo $data['link'] ?>">

                <?php

                $id = 5;

                $sql = 'SELECT * FROM menu WHERE id = :id';
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['id' => $id]);

                // สำหรับการดึงข้อมูลแถวเดียว
                $data = $stmt->fetch(PDO::FETCH_ASSOC);

                ?>
                <h5 class="mt-3">กิจกรรมโรงเรียน</h5>
                <input type="text" class="form-control w-100" value="<?php echo $data['link'] ?>">

                <?php

                $id = 6;

                $sql = 'SELECT * FROM menu WHERE id = :id';
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['id' => $id]);

                // สำหรับการดึงข้อมูลแถวเดียว
                $data = $stmt->fetch(PDO::FETCH_ASSOC);

                ?>
                <h5 class="mt-3">โครงการ</h5>
                <input type="text" class="form-control w-100" value="<?php echo $data['link'] ?>">

                <?php

                $id = 7;

                $sql = 'SELECT * FROM menu WHERE id = :id';
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['id' => $id]);

                // สำหรับการดึงข้อมูลแถวเดียว
                $data = $stmt->fetch(PDO::FETCH_ASSOC);

                ?>
                <h5 class="mt-3">ปฏิทิน</h5>
                <input type="text" class="form-control w-100" value="<?php echo $data['link'] ?>">

                <?php

                $id = 8;

                $sql = 'SELECT * FROM menu WHERE id = :id';
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['id' => $id]);

                // สำหรับการดึงข้อมูลแถวเดียว
                $data = $stmt->fetch(PDO::FETCH_ASSOC);

                ?>
                <h5 class="mt-3">comment</h5>
                <input type="text" class="form-control w-100" value="<?php echo $data['link'] ?>">

                <input type="submit" class="btn btn-success mt-3 w-100" value="Save">
            </form> -->


            <div class="table-responsive mt-4">
                <table id="table" class="table table-row-bordered gy-5">
                    <thead>
                        <tr class="fw-semibold fs-6 text-muted">
                            <th>id</th>
                            <th>link</th>
                            <th>title</th>
                            <th>icon</th>
                            
                            <th>option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM menu";
                        $stmt = $pdo->query($sql);
                        ?>
                        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['link'] ?></td>
                                <td><?php echo $row['title'] ?></td>
                                <td><?php echo $row['icon'] ?></td>
                            
                                <td class="d-flex">
                                    <a href="./edit-menu.php?id=<?php echo $row['id'] ?>    " class="btn btn-primary m-auto"><i class="fa-solid fa-pencil"></i> edit</a>
                                    
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>id</th>
                            <th>link</th>
                            <th>title</th>
                            <th>icon</th>
                            
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

if (isset($_GET['e'])) {
    $status = $_GET['e'];

    if ($status == "success") {
        echo '<script>
        Swal.fire({
            title: "แก้ให้แล้วน่ะะะ",
            text: "อิอิ",
            icon: "success"
          });
        </script>';
    }

    if ($status == "error") {
        echo '<script>
        Swal.fire({
            title: "แก้ไม่ได้น่ะ",
            text: "อาว..",
            icon: "error"
          });
        </script>';
    }
}
?>