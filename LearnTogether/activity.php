<?php
require_once "../config/conn.php";

if (isset($_GET['search'])) {
    $keyword = $_GET['search'];


    $sql = "SELECT * FROM learn_activity WHERE title LIKE :search";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['search' => "%$keyword%"]); // Add wildcards for partial search
} else {
    $sql = "SELECT * FROM learn_activity";
    $stmt = $pdo->query($sql);
}
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
        <h1>กิจกรรมต่างๆ</h1>

        <div class="box">
            <div class="row pt-3 mx-3">
                <div class="col-lg-4"></div>
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    <form action="./activity.php" method="get">
                        <div class="input-group mb-3">

                            <input type="text" class="form-control" placeholder="ค้นหา" autocomplete="off" name="search" aria-label="Username" aria-describedby="basic-addon1">
                            <button class="input-group-text" type="submit" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4 mt-1  pb-3 mx-3">
                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                    <div class="col">
                        <a href="./detail.php?id=<?= $row['id'] ?>" class="">
                            <div class="card">

                                <img src="./post/<?= $row['img'] ?>" class="card-img-top" alt="<?= $row['img'] ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $row['title'] ?></h5>
                                    <!-- <p class="card-text"><?= $row['decp'] ?></p> -->
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>

            </div>
        </div>

        <script src="../Framework/fontawsome/js/all.js"></script>
        <script src="../Framework/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>