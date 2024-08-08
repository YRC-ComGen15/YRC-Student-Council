<?php

ob_start();

require_once "./config/conn.php";

$keyword = $_GET['keyword']

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
    </header>

    <main class="p-5">
        <div class="border-menu">
            <div class="top-menu">
                <h4 class="text-white px-3 py-3">ค้นหาประชาสัมพันธ์</h4>
            </div>

            <div class="container">
                <?php
                $sql = "SELECT * FROM announce WHERE title LIKE :keyword";
                // $stmt = $pdo->query($sql);

                $stmt = $pdo->prepare($sql);
                $stmt->execute(['keyword' => $keyword]);

                ?>
                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                    <a href="./post.php?id=<?php echo $row['id'] ?>" class="nav-link py-1"><?php echo $row['title'] ?></a>
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

    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $("#table").DataTable({

        });
    </script>

</body>

</html>โ