<?php
session_start();
require_once "../../config/conn.php"; // ใช้ PDO

// ตรวจสอบว่ามีการส่งข้อมูลมาหรือไม่
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = trim($_POST["title"]);
    $link = trim($_POST["link"]);

    // ตรวจสอบว่าได้อัปโหลดไฟล์มาหรือไม่
    if (!isset($_FILES["img_file"]) || $_FILES["img_file"]["error"] !== UPLOAD_ERR_OK) {
        header("Location: ../index.php?a=error");
        exit();
    }

    $file = $_FILES["img_file"];
    $fileName = basename($file["name"]);
    $fileTmpPath = $file["tmp_name"];
    $fileType = mime_content_type($fileTmpPath);
    $allowedTypes = ["image/jpeg", "image/png", "image/gif"];

    // ตรวจสอบว่าเป็นไฟล์ภาพหรือไม่
    if (!in_array($fileType, $allowedTypes)) {
        header("Location: ../index.php?a=error");
        exit();
    }

    // กำหนดชื่อไฟล์ใหม่ให้ไม่ซ้ำกัน
    $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
    $newFileName = uniqid("img_", true) . "." . $fileExt;
    $uploadDir = "../../img/";
    $destination = $uploadDir . $newFileName;

    // อัปโหลดไฟล์
    if (move_uploaded_file($fileTmpPath, $destination)) {
        // บันทึกข้อมูลลงฐานข้อมูล
        $filePath = $newFileName;
        $sql = "INSERT INTO project (title, link, icon) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);

        // ใช้ execute() แทน bind_param()
        if ($stmt->execute([$title, $link, $filePath])) {
            header("Location: ../index.php?a=success");
            exit();
        } else {
            header("Location: ../index.php?a=error");
            exit();
        }
    } else {
        header("Location: ../index.php?a=error");
        exit();
    }
} else {
    header("Location: ../index.php");
    exit();
}
?>