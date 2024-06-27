<?php
ob_start();
require_once "../../config/conn.php";

// Create variables for the date and random number
$date1 = date("Ymd_His");
$numrand = mt_rand();
$img_file = isset($_POST['img_file']) ? $_POST['img_file'] : '';
$upload = $_FILES['img_file']['name'];

echo $upload;

// File upload handling
if ($upload != '') {
    $typefile = strrchr($_FILES['img_file']['name'], ".");

    // Check file extensions

    $path = "../../pdf/";
    $newname = $_FILES['img_file']['name'];
    $path_copy = $path . $newname;

    // Ensure the directory exists
    if (!is_dir($path)) {
        mkdir($path, 0777, true);
    }

    move_uploaded_file($_FILES['img_file']['tmp_name'], $path_copy);

    $date = date("d-m-Y");

    // SQL insert
    $stmt = $pdo->prepare("INSERT INTO files (file_name, date) VALUES (:file_name, :date)");
    $stmt->bindParam(':file_name', $newname, PDO::PARAM_STR);
    $stmt->bindParam(':date', $date, PDO::PARAM_STR);
    $result = $stmt->execute();

    if ($result) {
        header("Location: ../files.php?b=success");
    } else {
        header("Location: ../files.php?b=error");
    }
}
