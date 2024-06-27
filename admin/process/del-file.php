<?php

ob_start();

$id = $_GET['id'];

require_once "../../config/conn.php";

//ลบไฟล์จากโฟลเดอร์
$sql = 'SELECT * FROM files WHERE id = :id';
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);

// สำหรับการดึงข้อมูลแถวเดียว
$data = $stmt->fetch(PDO::FETCH_ASSOC);

$file = '../../pdf/' . $data['file_name']; // กำหนดเส้นทางไปยังไฟล์ที่ต้องการลบ

if (file_exists($file)) {
    if (unlink($file)) {
        echo "ไฟล์ $file ถูกลบเรียบร้อยแล้ว";
    } else {
        echo "ไม่สามารถลบไฟล์ $file ได้";
    }
} else {
    echo "ไฟล์ $file ไม่พบ";
}

// สร้าง SQL สำหรับลบข้อมูล
$sql = 'DELETE FROM files WHERE id = :id';

// เตรียมคำสั่ง SQL
$stmt = $pdo->prepare($sql);

// ผูกค่า ID กับพารามิเตอร์ใน SQL
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

// ดำเนินการคำสั่ง SQL
if ($stmt->execute()) {
    header("Location: ../files.php?d=success");
} else {
    header("Location: ../files.php?d=error");
}
