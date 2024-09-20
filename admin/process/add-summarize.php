<?php
ob_start();
require_once "../../config/conn.php";

// สร้างตัวแปรสำหรับวันที่และตัวเลขสุ่ม
$date1 = date("Ymd_His");
$numrand = mt_rand();

// ตรวจสอบว่ามีการส่งไฟล์หรือไม่
$img_file = isset($_POST['img_file']) ? $_POST['img_file'] : '';
$upload = $_FILES['img_file']['name'] ?? '';

// ตรวจสอบว่ามีการอัปโหลดไฟล์หรือไม่
if ($upload != '') {
    // กำหนดที่อยู่สำหรับจัดเก็บไฟล์
    $path = "../files/";
    $newname = $numrand . $date1 . strrchr($_FILES['img_file']['name'], ".");
    $path_copy = $path . $newname;

    // ตรวจสอบและสร้างโฟลเดอร์หากไม่มี
    if (!is_dir($path)) {
        mkdir($path, 0777, true);
    }

    // ย้ายไฟล์อัปโหลดไปยังที่อยู่ที่ต้องการ
    move_uploaded_file($_FILES['img_file']['tmp_name'], $path_copy);

    // รับค่าจากฟอร์ม
    $title = $_POST['title'];
    $date = date("d-m-Y");

    // การเพิ่มข้อมูลลงฐานข้อมูล
    $stmt = $pdo->prepare("INSERT INTO summarize (title, file, date) VALUES (:title, :img, :date)");
    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':img', $newname, PDO::PARAM_STR);
    $stmt->bindParam(':date', $date, PDO::PARAM_STR);

    // ตรวจสอบผลการเพิ่มข้อมูล
    $result = $stmt->execute();

    // ส่งผู้ใช้ไปยังหน้าผลลัพธ์
    if ($result) {
        header("Location: ../summarize.php?a=success");
    } else {
        header("Location: ../summarize.php?a=error");
    }
}
?>
