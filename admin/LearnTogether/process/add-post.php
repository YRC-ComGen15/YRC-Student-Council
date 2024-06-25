<?php
ob_start();
require_once "../../../config/conn.php";

// Create variables for the date and random number
$date1 = date("Ymd_His");
$date = date("d-m-Y");
$numrand = mt_rand();
$img_file = isset($_POST['img_file']) ? $_POST['img_file'] : '';
$upload = $_FILES['img_file']['name'];

// File upload handling
if ($upload != '') {
    $typefile = strrchr($_FILES['img_file']['name'], ".");

    $path = "../../../LearnTogether/post/";
    $newname = $numrand . $date1 . $typefile;
    $path_copy = $path . $newname;

    // Ensure the directory exists
    if (!is_dir($path)) {
        mkdir($path, 0777, true);
    }

    move_uploaded_file($_FILES['img_file']['tmp_name'], $path_copy);

    // Variables from form
    $title = $_POST['title'];
    $decp = $_POST['decp'];
    $link = $_POST['link'];
    $date = date("d-m-Y");

    // SQL update
    $stmt = $pdo->prepare("INSERT INTO learn_activity (title, decp, img, link, date) VALUES (:title, :decp, :img, :link, :date)");
    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':decp', $decp, PDO::PARAM_STR);
    $stmt->bindParam(':img', $newname, PDO::PARAM_STR);
    $stmt->bindParam(':link', $link, PDO::PARAM_STR);
    $stmt->bindParam(':date', $date, PDO::PARAM_STR);
    $result = $stmt->execute();

    if ($result) {
        header("Location: ../index.php?a=success");
    } else {
        header("Location: ../index.php?a=error");
    }
} else {
    header("Location: ../index.php?a=error");
}
