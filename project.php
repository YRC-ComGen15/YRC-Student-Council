<?php ob_start();

session_start();

require_once("./config/conn.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YRC Student Council</title>

    <!-- icon -->
    <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">

    <!-- bootstrap -->
    <link rel="stylesheet" href="./Framework/bootstrap/css/bootstrap.min.css">
    <script src="./Framework/bootstrap/js/bootstrap.bundle.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="./asset/css/index.css">

    <!-- fontawsome -->
    <link rel="stylesheet" href="./Framework/fontawsome/css/all.css">


</head>

<body>
    <header>
        <?php include_once("./component/Header.php") ?>
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
            <img src="./img/banner/<?php echo $banner2['content']; ?>" class="d-block w-100" alt="">
        </div>
    </header>

    <main class="p-5">
        <h1 class="text-center">โครงการต่างๆ</h1>
        <!-- MENU -->
        <div class="p-5 pt-0">
            <div class="row ">
                <!-- 1 -->
                <div class=" col-6 col-lg-4 mt-3">
                    <a href="" class="round m-auto d-flex">
                        <p href="" class="m-auto text-round"><i class="fa-solid fa-users"></i></p>
                    </a>
                    <h4 class="text-center mt-2">YRC We healthcare</h4>
                </div>

                <div class=" col-6 col-lg-4 mt-3 ">
                    <a href="./LearnTogether/index.php" class="round m-auto d-flex">
                        <p href="" class="m-auto text-round"><i class="fa-solid fa-book"></i></p>
                    </a>
                    <h4 class="text-center mt-2">YRC We learn to get her</h4>
                </div>

                <div class=" col-6 col-lg-4 mt-3">
                    <a href="" class="round m-auto d-flex">
                        <p href="" class="m-auto text-round"><i class="fa-solid fa-people-group"></i></p>
                    </a>
                    <h4 class="text-center mt-2">FUN Festival</h4>
                </div>

                <div class=" col-6 col-lg-4 mt-3">
                    <a href="" class="round m-auto d-flex">
                        <p href="" class="m-auto text-round"><i class="fa-solid fa-map"></i></p>
                    </a>
                    <h4 class="text-center mt-2">YRC WE SUPPORT SOCIAL</h4>
                </div>

                <div class=" col-6 col-lg-4 mt-3">
                    <a href="" class="round m-auto d-flex">
                        <p href="" class="m-auto text-round"><i class="fa-solid fa-school"></i></p>
                    </a>
                    <h4 class="text-center mt-2">YRC green to grow</h4>
                </div>

                <div class=" col-6 col-lg-4 mt-3">
                    <a href="./project.php" class="round m-auto d-flex">
                        <p href="" class="m-auto text-round"><i class="fa-solid fa-chalkboard"></i></p>
                    </a>
                    <h4 class="text-center mt-2">Zero Waste</h4>
                </div>

                
            </div>
        </div>
    </main>

    <footer class="d-block">
        <?php include_once("./component/Footer.php") ?>
    </footer>

    <!-- script bootstrap -->
    <script src="./Framework/bootstrap/js/bootstrap.bundle.js"></script>

    <!-- fontawsome -->
    <script src="./Framework/fontawsome/js/all.js"></script>

</body>

</html>