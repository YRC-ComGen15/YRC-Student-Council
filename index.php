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

        <div class="d-block bg-pink w-100 text-light py-4 text-center">
            <h2>สภานักเรียนโรงเรียนยุพราชวิทยาลัย</h2>
            <h5>YRC Student Council</h5>
        </div>
        <!-- banner -->
        <div class="d-block w-100">
            <?php

            $banner2 = "banner2";

            $sql = 'SELECT * FROM setting WHERE title = :title';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['title' => $banner2]);

            // สำหรับการดึงข้อมูลแถวเดียว
            $banner2 = $stmt->fetch(PDO::FETCH_ASSOC);


            ?>
            <img src="./img/banner/<?php echo $banner2['content']; ?>" class="d-block w-100" alt="">
        </div>

    </header>

    <main>
        <!-- MENU -->
        <div class="p-5">
            <div class="row ">
                <!-- 1 -->
                <div class=" col-6 col-lg-3 mt-3">
                    <a href="" class="round m-auto d-flex">
                        <p href="" class="m-auto text-round"><i class="fa-solid fa-users"></i></p>
                    </a>
                    <h4 class="text-center mt-2">สภานักเรียน</h4>
                </div>

                <div class=" col-6 col-lg-3 mt-3 ">
                    <a href="" class="round m-auto d-flex">
                        <p href="" class="m-auto text-round"><i class="fa-solid fa-book"></i></p>
                    </a>
                    <h4 class="text-center mt-2">คู่มือนักเรียน</h4>
                </div>

                <div class=" col-6 col-lg-3 mt-3">
                    <a href="" class="round m-auto d-flex">
                        <p href="" class="m-auto text-round"><i class="fa-solid fa-people-group"></i></p>
                    </a>
                    <h4 class="text-center mt-2">กฏระเบียบ</h4>
                </div>

                <div class=" col-6 col-lg-3 mt-3">
                    <a href="" class="round m-auto d-flex">
                        <p href="" class="m-auto text-round"><i class="fa-solid fa-map"></i></p>
                    </a>
                    <h4 class="text-center mt-2">แผนที่โรงเรียน</h4>
                </div>

                <div class=" col-6 col-lg-3 mt-3">
                    <a href="" class="round m-auto d-flex">
                        <p href="" class="m-auto text-round"><i class="fa-solid fa-school"></i></p>
                    </a>
                    <h4 class="text-center mt-2">กิจกรรมโรงเรียน</h4>
                </div>

                <div class=" col-6 col-lg-3 mt-3">
                    <a href="./project.php" class="round m-auto d-flex">
                        <p href="" class="m-auto text-round"><i class="fa-solid fa-chalkboard"></i></p>
                    </a>
                    <h4 class="text-center mt-2">โครงการ</h4>
                </div>

                <div class=" col-6 col-lg-3 mt-3">
                    <a href="#canlendar" class="round m-auto d-flex">
                        <p href="" class="m-auto text-round"><i class="fa-solid fa-calendar-days"></i></p>
                    </a>
                    <h4 class="text-center mt-2">ปฏิทิน</h4>
                </div>

                <div class=" col-6 col-lg-3 mt-3">
                    <a href="" class="round m-auto d-flex">
                        <p href="" class="m-auto text-round"><i class="fa-solid fa-comments"></i></p>
                    </a>
                    <h4 class="text-center mt-2">Comment</h4>
                </div>
            </div>
        </div>

        <!-- banner สภานักเรียนแบบเลื่อนได้ -->
        <div id="sca" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#sca" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#sca" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#sca" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#sca" data-bs-slide-to="3" aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#sca" data-bs-slide-to="4" aria-label="Slide 5"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="#">
                        <img src="./img/banner/project1.png" class="d-block w-100" alt="...">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="#">
                        <img src="./img/banner/project2.png" class="d-block w-100" alt="...">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="#">
                        <img src="./img/banner/project3.png" class="d-block w-100" alt="...">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="#">
                        <img src="./img/banner/project4.png" class="d-block w-100" alt="...">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="#">
                        <img src="./img/banner/project5.png" class="d-block w-100" alt="...">
                    </a>
                </div>
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

        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="#">
                        <img src="./img/banner/project1.png" class="d-block w-100" alt="...">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="#">
                        <img src="./img/banner/project2.png" class="d-block w-100" alt="...">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="#">
                        <img src="./img/banner/project3.png" class="d-block w-100" alt="...">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="#">
                        <img src="./img/banner/project4.png" class="d-block w-100" alt="...">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="#">
                        <img src="./img/banner/project5.png" class="d-block w-100" alt="...">
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
        <div class="p-5" id="canlendar">
            <!-- <div id='calendar'></div> -->
            <iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=1&ctz=Asia%2FBangkok&bgcolor=%23ff1493&title=%E0%B8%95%E0%B8%B2%E0%B8%A3%E0%B8%B2%E0%B8%87%E0%B8%87%E0%B8%B2%E0%B8%99%E0%B9%82%E0%B8%A3%E0%B8%87%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99&showTz=0&showTitle=0&src=dGgudGgjaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&color=%230B8043" style="border:solid 1px #777" width="100%" height="100%" frameborder="0" scrolling="no"></iframe>
        </div>

        <!-- ประชาสัมพันธ์ -->
        <div class="p-5">
            <h1 class="text-center">ประชาสัมพันธ์</h1>

            <?php include_once(".//component/Slider.php"); ?>
            
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