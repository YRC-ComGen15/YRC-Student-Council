<?php

require_once "../config/conn.php";

require_once "../config/conn.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Sharing</title>

    <link rel="shortcut icon" href="../img/learn-logo.png" type="image/x-icon">

    <link rel="stylesheet" href="../Framework/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="./share.css">

    <link rel="stylesheet" href="../asset/css/post.css">

    <link rel="stylesheet" href="../asset/css/index.css">
</head>

<body class="p-5">
    <div class="border-menu">
        <div class="top-menu">
            <h4 class="text-white px-3 py-3">ชั้นหนังสือ</h4>
        </div>

        <div class="w-100 d-flex row px-1">
            <form action="./bookshelf.php" class=" mt-3 d-flex col-6" method="get">

                <select name="category" class="form-control w-100" id="category">
                    <option value="0">เลือกประเภทหนังสือ</option>
                    <?php
                    $sql = "SELECT * FROM learn_category";
                    $stmt = $pdo->query($sql);
                    ?>
                    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?php echo $row['category'] ?>"><?php echo $row['category'] ?></option>
                    <?php } ?>
                </select>

                <input type="submit" class="btn btn-success mx-2" value="ค้นหา">
            </form>

            <form action="./bookshelf.php" class="mt-3 d-flex col-6" method="get">

                <input type="text" class="form-control" name="search" placeholder="ค้นหาหนังสือที่ต้องการ">

                <input type="submit" class="btn btn-success mx-2" value="ค้นหา">
            </form>
        </div>

        <div class="bookshelf--frame mb-5 mt-3">
            <?php

            if (isset($_GET['category'])) {
                $category = $_GET['category']; // Assuming you retrieved the category from URL
                $sql = "SELECT * FROM learn_booksharing WHERE status = 'active' AND category = :category";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['category' => $category]); // Pass an array with key 'category' and its value
            } else if (isset($_GET['search'])) {
                $search = $_GET['search'];
                $sql = "SELECT * FROM learn_booksharing WHERE status = 'active' AND title LIKE :search";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['search' => $search]);
            } else {
                $sql = "SELECT * FROM learn_booksharing WHERE status = 'active'";
                $stmt = $pdo->query($sql);
            }

            // $stmt = $pdo->query($sql);

            ?>
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="book-wrapper">
                    <a href="<?php echo $row['google_drive'] ?>">
                        <img src="./BookCover/<?php echo $row['img'] ?>" width="300" height="500" alt="A tall book">
                    </a>
                </div>
            <?php } ?>

        </div>
        <script src="../Framework/bootstrap/js/bootstrap.bundle.js"></script>
        <script src="../Framework/jq/jq.js">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            <?php
            // $stmt = $pdo->query($sql);
            if (isset($_GET['category'])) {
                $category = $_GET['category']; // Assuming you retrieved the category from URL
                $sql = "SELECT * FROM learn_booksharing WHERE status = 'active' AND category = :category";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['category' => $category]); // Pass an array with key 'category' and its value
            } else if (isset($_GET['search'])) {
                $search = isset($_GET['search']) ? $_GET['search'] : ''; // Set empty string if search is not set

                $sql = "SELECT * FROM learn_booksharing WHERE status = 'active' AND title LIKE :search";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['search' => "%$search%"]); // Add wildcards for partial search
            } else {
                $sql = "SELECT * FROM learn_booksharing WHERE status = 'active'";
                $stmt = $pdo->query($sql);
            }
            ?>
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                $(document).ready(() => {
                    $("#<?php echo $row['id'] ?>").click(() => {
                        Swal.fire({
                            imageUrl: "./BookCover/<?php echo $row['img'] ?>",
                            imageHeight: 500,
                            title: "<?php echo $row['title'] ?>",
                            text: `หมวดหมู่ <?php echo $row['category'] ?>\n รายละเอียด : <?php echo $row['decp'] ?>`,
                            html: `<b>หมวดหมู่</b> <?php echo $row['category'] ?><br> <b>รายละเอียด :</b> <?php echo $row['decp'] ?>`,
                            // icon: "question"
                        });
                        console.log("<?php echo $row['title'] ?>");
                    })
                })
            <?php } ?>
        </script>
</body>

</html>

<?php

if (isset($_GET['a'])) {
    $status = $_GET['a'];
    if ($status == "success") {
        echo '<script>Swal.fire({
  title: "Success",
  text: "เราได้ส่งหนังสือของคุณให้ทางสภานักเรียนแล้ว",
  icon: "success"
});</script>';
    }
}

?>

</body>

</html>