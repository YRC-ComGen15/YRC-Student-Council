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

    <!-- project -->
    <link rel="stylesheet" href="./asset/css/project.css">


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
        <marquee behavior="" direction="left">คำขวัญของสภานักเรียนโรงเรียนยุพราชวิทยาลัย "สภานักเรียน เรียนรู้ด้วยปัญญา พัฒนาศักยภาพ เสริมสร้างประชาธิปไตย" Student Council Association Yupparaj Wittayalai School ( SCA YRC )</marquee>
    </header>

    <main class="p-5">
        <h1 class="text-center">โครงการของสภานักเรียน</h1>
        <!-- MENU -->
        <div class="p-3 pt-0">
            <div class="row ">
                <?php
                $sql = "SELECT * FROM project";
                $stmt = $pdo->query($sql);
                ?>
                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                    <!-- 1 -->
                    <div class=" col-6 col-lg-4 mt-3">
                        <a href="<?=$row['link'] ?>" class="">
                            <div class="carousel-inner round m-auto d-flex p-0">
                                <img src="./img/<?=$row['icon'] ?>" class="w-100 h-100" alt="">
                            </div>

                        </a>
                        <h4 class="text-center mt-2"> <?=$row['title'] ?></h4>
                    </div>
                <?php } ?>
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
<?php

if (isset($_GET['status'])) {
    if ($_GET['status'] == 'coming') {
        echo '<script>Swal.fire({
  title: "Coming Soon !",
  text: "เว็บกำลังจะเปิดตัวเร็วๆนี้",
  icon: "warning"
});</script>';
    }
}

?>