<?php

ob_start();

require_once "./config/conn.php";

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

    <!-- post -->
    <link rel="stylesheet" href="./asset/css/post.css">


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

    <main class="p-1">
        <?php

        $id=1;

        $sql = 'SELECT * FROM studentcouncil WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);

        // สำหรับการดึงข้อมูลแถวเดียว
        $data = $stmt->fetch(PDO::FETCH_ASSOC);


        ?>
        <div>
        
            
                <img src="./img/post/<?php echo $data['img'] ?>" class="w-100 border-menu" alt="">
                
           
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