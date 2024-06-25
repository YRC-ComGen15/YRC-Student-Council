<?php
require_once "../config/conn.php";

$id = $_GET['id'];

$sql = 'SELECT * FROM learn_activity WHERE id = :id';
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);

// สำหรับการดึงข้อมูลแถวเดียว
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $url = "https://";
else
    $url = "http://";
// Append the host(domain name, ip) to the URL.   
$url .= $_SERVER['HTTP_HOST'];

// Append the requested resource location to the URL   
$url .= $_SERVER['REQUEST_URI'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity - LearnTogether</title>

    <link rel="shortcut icon" href="../img/learn-logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../Framework/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../asset/css/index.css">
    <link rel="stylesheet" href="../Framework/fontawsome/css/all.css">
    <link rel="stylesheet" href="./activity.css">
</head>

<body>
    <div class="container mt-5">
        <h1>รายละเอียด</h1>

        <div class="box">
            <div class="row pt-3 mx-3">
                <div class="col-lg-4">
                    <a href="./activity.php" class="nav-link">
                        <h5><i class="fa-solid fa-arrow-left"></i></h5>
                    </a>
                </div>
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    <!-- <form action="./activity.php" method="get">
                        <div class="input-group mb-3">

                            <input type="text" class="form-control" placeholder="ค้นหา" name="search" aria-label="Username" aria-describedby="basic-addon1">
                            <button class="input-group-text" type="submit" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form> -->
                </div>
            </div>

            <div class="row m-3 pb-3">
                <div class="col-12 col-lg-6">
                    <img src="./post/<?= $row['img'] ?>" class="w-100 rounded rounded-3" alt="">
                </div>
                <div class="col-12 col-lg-6 d-flex">
                    <div class="m-auto">
                        <h1 class="mt-5"><b><?= $row['title'] ?></b></h1>
                        <p><?= $row['decp'] ?></p>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" readonly aria-label="Username" value="<?= $url ?>" id="url" aria-describedby="basic-addon1">
                            <button class="input-group-text" id="basic-addon1" onclick="Copy()"><i class="fa-solid fa-copy"></i></button>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <script src="../Framework/fontawsome/js/all.js"></script>
        <script src="../Framework/bootstrap/js/bootstrap.bundle.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            function Copy() {
                var copyText = document.getElementById("url");
                copyText.select();
                copyText.setSelectionRange(0, 99999);
                navigator.clipboard.writeText(copyText.value);

                Swal.fire({
                    title: "Success",
                    text: "คัดลอกไปยังคลิปบอร์ดแล้ว",
                    icon: "success"
                });
            }
        </script>
</body>

</html>