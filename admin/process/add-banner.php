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
    
        $path = "../../img/banner/";
        $newname = $numrand . $date1 . $typefile;
        $path_copy = $path . $newname;

        // Ensure the directory exists
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }

        move_uploaded_file($_FILES['img_file']['tmp_name'], $path_copy);

        $date = date("d-m-Y");

        // SQL insert
        $stmt = $pdo->prepare("INSERT INTO banner3 (img) VALUES (:img)");
        $stmt->bindParam(':img', $newname, PDO::PARAM_STR);
        $result = $stmt->execute();

        if ($result) {
            header("Location: ../setting.php?b=success");
        } else {
            header("Location: ../setting.php?b=error");
        }
}
