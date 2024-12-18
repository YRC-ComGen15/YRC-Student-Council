<?php ob_start();

session_start();

require_once("./config/conn.php");

require_once "./config/countViewer.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YRC Student Council</title>

    <!-- icon -->
    <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">

    <!-- meta dec -->
    <meta name="description" content="เว็บไซต์สภานักเรียนโรงเรียนยุพราชวิทยาลัย" />

    <!-- meta keywords -->
    <meta name="keyword" content="yupparaj, ยุพราชวิทยาลัย, สภานักเรียน, สภานักเรียนโรงเรียนยุพราชวิทยาลัย, YRC Student Council, Student, Council, เว็บไซต์, โรงเรียน, สภานักเรียน,">

    <!-- bootstrap -->
    <link rel="stylesheet" href="./Framework/bootstrap/css/bootstrap.min.css">
    <script src="./Framework/bootstrap/js/bootstrap.bundle.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="./asset/css/index.css">

    <!-- fontawsome -->
    <link rel="stylesheet" href="./Framework/fontawsome/css/all.css">

    <!-- Meta OG -->
    <meta property="og:title" content="YRC Student Council">
    <meta property="og:description" content="เว็บไซต์สภานักเรียนโรงเรียนยุพราชวิทยาลัย">
    <meta property="og:image" content="./img/logo.png">

    <!-- TailWindCSS -->
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->

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
            <img src="./img/banner/<?php echo $banner2['content']; ?>" loading="lazy" class="d-block w-100" alt="แบนเนอร์สภานักเรียนโรงเรียนยุพราชวิทยาลัย">
        </div>

        <div class="d-block bg-pink w-100 text-light py-4 text-center">
            <img src="./img/logo.png" width="100" height="100" class="mb-2" alt="โลโก้สภานักเรียน">
            <h3 class="w-100"><b class="w-100">"สภานักเรียน เรียนรู้ด้วยปัญญา พัฒนาศักยภาพ เสริมสร้างประชาธิปไตย"</b></h3>
            <h4>สภานักเรียนโรงเรียนยุพราชวิทยาลัย</h4>
            <h5>YRC Student Council Association</h5>
        </div>
    </header>

    <main>
        <!-- MENU -->
        <div class="p-5">
            <div class="row ">
                <!-- 1 -->
                <?php
                $sql = "SELECT * FROM menu";
                $stmt = $pdo->query($sql);
                ?>
                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                    <div class=" col-6 col-lg-3 mt-3">

                        <a href="<?php echo $row['link'] ?>" class="round m-auto d-flex" rel=“nofollow”>
                            <p href="" class="m-auto "><?php echo $row['icon'] ?></p>
                        </a>
                        <h4 class="text-center mt-2"><?php echo $row['title'] ?></h4>
                    </div>
                <?php } ?>

            </div>
        </div

        <?php

        // คำสั่ง SQL เพื่อดึงข้อมูลรูปภาพ
        $stmt = $pdo->prepare("SELECT img,link FROM banner3");
        $stmt->execute();

        // ผลลัพธ์จากการ query
        $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>
        
        <!-- banner สภานักเรียนแบบเลื่อนได้ -->
        <div id="sca" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <?php foreach ($images as $key => $image) : ?>
                    <button type="button" data-bs-target="#sca" data-bs-slide-to="<?= $key ?>" <?= $key === 0 ? 'class="active" aria-current="true"' : '' ?> aria-label="Slide <?= $key + 1 ?>"></button>
                <?php endforeach; ?>
            </div>
            <div class="carousel-inner">
                <?php foreach ($images as $key => $image) : ?>
                    <div class="carousel-item <?= $key === 0 ? 'active' : '' ?>">
                        <a href="<?= $image['link'] ?>" rel=“nofollow”>
                            <img src="./img/banner/<?= $image['img'] ?>" loading="lazy" class="d-block w-100" alt="แบนเนอร์สภานักเรียนโรงเรียนยุพราชวิทยาลัย">
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#sca" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#sca" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- banner โครงการ -->

        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="./?status=coming" rel=“nofollow”>
                        <?php

                        $id = 2;

                        $sql = 'SELECT * FROM banner WHERE id = :id';
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute(['id' => $id]);

                        // สำหรับการดึงข้อมูลแถวเดียว
                        $data = $stmt->fetch(PDO::FETCH_ASSOC);

                        ?>
                        <img src="./img/banner/<?php echo $data['files'] ?>" loading="lazy" class="d-block w-100" alt="<?= $data['project'] ?>">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="./LearnTogether/" rel=“nofollow”>
                        <?php

                        $id = 1;

                        $sql = 'SELECT * FROM banner WHERE id = :id';
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute(['id' => $id]);

                        // สำหรับการดึงข้อมูลแถวเดียว
                        $data = $stmt->fetch(PDO::FETCH_ASSOC);

                        ?>
                        <img src="./img/banner/<?php echo $data['files'] ?>" loading="lazy" class="d-block w-100" alt="<?= $data['project'] ?>">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="./?status=coming" rel=“nofollow”>
                        <?php

                        $id = 3;

                        $sql = 'SELECT * FROM banner WHERE id = :id';
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute(['id' => $id]);

                        // สำหรับการดึงข้อมูลแถวเดียว
                        $data = $stmt->fetch(PDO::FETCH_ASSOC);

                        ?>
                        <img src="./img/banner/<?php echo $data['files'] ?>" loading="lazy" class="d-block w-100" alt="<?= $data['project'] ?>">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="./?status=coming" rel=“nofollow”>
                        <?php

                        $id = 4;

                        $sql = 'SELECT * FROM banner WHERE id = :id';
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute(['id' => $id]);

                        // สำหรับการดึงข้อมูลแถวเดียว
                        $data = $stmt->fetch(PDO::FETCH_ASSOC);

                        ?>
                        <img src="./img/banner/<?php echo $data['files'] ?>" loading="lazy" class="d-block w-100" alt="<?= $data['project'] ?>">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="./?status=coming" rel=“nofollow”>
                        <?php

                        $id = 5;

                        $sql = 'SELECT * FROM banner WHERE id = :id';
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute(['id' => $id]);

                        // สำหรับการดึงข้อมูลแถวเดียว
                        $data = $stmt->fetch(PDO::FETCH_ASSOC);

                        ?>
                        <img src="./img/banner/<?php echo $data['files'] ?>" loading="lazy" class="d-block w-100" alt="<?= $data['project'] ?>">
                    </a>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- canlendar -->


        <!-- ประชาสัมพันธ์ -->
        <div class="p-5">
            <h1 class="text-center">ประชาสัมพันธ์</h1>

            <?php include_once("./component/Slider.php"); ?>

        </div>

    </main>

    <footer class="d-block">
        <?php include_once("./component/Footer.php") ?>
    </footer>

    <!-- script bootstrap -->
    <script src="./Framework/bootstrap/js/bootstrap.bundle.js"></script>

    <!-- fontawsome -->
    <script src="./Framework/fontawsome/js/all.js"></script>

    <!-- Sweetalert -->
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