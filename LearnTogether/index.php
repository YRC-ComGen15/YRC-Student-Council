<?php ob_start();

session_start();

require_once("../config/conn.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YRC Student Council</title>

    <!-- icon -->
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">

    <!-- bootstrap -->
    <link rel="stylesheet" href="../Framework/bootstrap/css/bootstrap.min.css">
    <script src="../Framework/bootstrap/js/bootstrap.bundle.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="../asset/css/index.css">

    <!-- fontawsome -->
    <link rel="stylesheet" href="../Framework/fontawsome/css/all.css">


</head>

<body>
    <header>
        <?php include_once("./Header.php") ?>
        <?php

        $banner2 = "banner";

        $sql = 'SELECT * FROM setting WHERE title = :title';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['title' => $banner2]);

        // สำหรับการดึงข้อมูลแถวเดียว
        $banner2 = $stmt->fetch(PDO::FETCH_ASSOC);


        ?>
        <!-- banner -->
        <div class="d-block w-100 mt-5">
            <img src="../img/banner/<?php echo $banner2['content']; ?>" class="d-block w-100" alt="">
        </div>
    </header>

    <main class="p-5">
        
    </main>

    <footer class="d-block">
        <?php include_once("./Footer.php") ?>
    </footer>

    <!-- script bootstrap -->
    <script src="../Framework/bootstrap/js/bootstrap.bundle.js"></script>

    <!-- fontawsome -->
    <script src="../Framework/fontawsome/js/all.js"></script>

</body>

</html>