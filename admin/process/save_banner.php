<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $upload_dir = "../../img/banner/";

    // Handle banner1 upload
    if (isset($_FILES['banner1']) && $_FILES['banner1']['error'] == UPLOAD_ERR_OK) {
        $typefile = strrchr($_FILES['banner1']['name'], ".");
        $name_file = "Banner1" . $typefile;
        $tmp_name = $_FILES['banner1']['tmp_name'];
        move_uploaded_file($tmp_name, $upload_dir . $name_file);
    }

    // Handle banner2 upload
    if (isset($_FILES['banner2']) && $_FILES['banner2']['error'] == UPLOAD_ERR_OK) {
        $typefile = strrchr($_FILES['banner2']['name'], ".");
        $name_file = "Banner2" . $typefile;
        $tmp_name = $_FILES['banner2']['tmp_name'];
        move_uploaded_file($tmp_name, $upload_dir . $name_file);
    }

    header("Location: ../setting.php");
    exit();
}
