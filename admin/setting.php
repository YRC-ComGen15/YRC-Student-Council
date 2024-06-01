<?php

require_once "../config/conn.php";

ob_start();
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ./login.php");
}

$banner1 = "banner";

$sql = 'SELECT * FROM setting WHERE title = :title';
$stmt = $pdo->prepare($sql);
$stmt->execute(['title' => $banner1]);

// สำหรับการดึงข้อมูลแถวเดียว
$banner1 = $stmt->fetch(PDO::FETCH_ASSOC);

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
            <h1><i class="fa-solid fa-gear"></i> Setting</h1>
            <div class="box p-5">
                <div class="d-block">
                    <form action="./process/save_banner.php" method="post" enctype="multipart/form-data">
                        <h3>Banner สภานักเรียน</h3>
                        <div class="d-block box mt-3">
                            <a href="" class="m-auto">
                                <img src="../img/banner/<?php echo isset($banner1['content']) ? htmlspecialchars($banner1['content']) : ''; ?>" class="w-100" alt="">
                            </a>
                            <div class="box-input">
                                <input type="file" class="form-control" name="banner1" accept="image/png, image/gif, image/jpeg">
                            </div>
                        </div>

                        <?php
                        $banner2 = "banner2";
                        $sql = 'SELECT * FROM setting WHERE title = :title';
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute(['title' => $banner2]);
                        $banner2 = $stmt->fetch(PDO::FETCH_ASSOC);
                        ?>

                        <h3 class="mt-3">Banner สภานักเรียน2</h3>
                        <div class="d-block box mt-3">
                            <a href="" class="m-auto">
                                <img src="../img/banner/<?php echo isset($banner2['content']) ? htmlspecialchars($banner2['content']) : ''; ?>" class="w-100" alt="">
                            </a>
                            <div class="box-input">
                                <input type="file" class="form-control" name="banner2" accept="image/png, image/gif, image/jpeg">
                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary w-100 mt-3" value="บันทึก">
                    </form>


                </div>
            </div>
        </div>
    </main>
    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../Framework/bootstrap/js/bootstrap.bundle.js"></script>

</body>

</html>