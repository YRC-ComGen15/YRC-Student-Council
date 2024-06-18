<?php

require_once"../config/conn.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Sharing</title>

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

        <form action="./bookshelf.php" class="mx-5 mt-3 d-flex" method="get">

            <select name="category" class="form-control w-50" id="category">
                <option value="0">เลือกประเภทหนังสือ</option>
                <?php
                $sql = "SELECT * FROM learn_category";
                $stmt = $pdo->query($sql);
                ?>
                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value="<?php echo $row['id'] ?>"><?php echo $row['category'] ?></option>
                <?php } ?>
            </select>

            <input type="submit" class="btn btn-success mx-2" value="ค้นหา">
        </form>

        <div class="bookshelf--frame mb-5 mt-3">
            <div class="book-wrapper">
                <a href="https://google.com">
                    <img src="https://via.placeholder.com/300x500?text=A%20tall%20book" width="300" height="500" alt="A tall book">
                </a>
            </div>

        </div>
    </div>
    <script src="../Framework/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>