<?php
ob_start();
require_once "../../config/conn.php";

// Create variables for the date and random number
$date1 = date("Ymd_His");
$numrand = mt_rand();
$img_file = isset($_POST['img_file']) ? $_POST['img_file'] : '';
$upload = $_FILES['img_file']['name'];

// File upload handling
if ($upload != '') {
    $typefile = strrchr($_FILES['img_file']['name'], ".");

    // Check file extensions
    
        $path = "../BookCover/";
        $newname = $numrand . $date1 . $typefile;
        $path_copy = $path . $newname;

        // Ensure the directory exists
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }

        move_uploaded_file($_FILES['img_file']['tmp_name'], $path_copy);

        $date = date("d-m-Y");
        $title = $_POST['title'];
        $category = $_POST['category'];
        $decp = $_POST['decp'];
        $name = $_POST['link'];
        

        // SQL insert
        $stmt = $pdo->prepare("INSERT INTO learn_booksharing (title, category, decp, img, date, google_drive) VALUES (:title, :category, :decp, :img, :date, :link)");
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':category', $category, PDO::PARAM_STR);
        $stmt->bindParam(':decp', $decp, PDO::PARAM_STR);
        $stmt->bindParam(':img', $newname, PDO::PARAM_STR);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR);
        $stmt->bindParam(':link', $name, PDO::PARAM_STR);
        $result = $stmt->execute();

        if ($result) {
            header("Location: ../bookshelf.php?a=success");
        } else {
            header("Location: ../bookshelf.php?a=error");
        }
}
