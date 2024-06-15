<?php

ob_start();

$id = $_GET['id'];

require_once "../../config/conn.php";


// สร้าง SQL สำหรับลบข้อมูล
$sql = 'DELETE FROM banner3 WHERE id = :id';

// เตรียมคำสั่ง SQL
$stmt = $pdo->prepare($sql);

// ผูกค่า ID กับพารามิเตอร์ใน SQL
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

// ดำเนินการคำสั่ง SQL
if ($stmt->execute()) {
    header("Location: ../setting.php?d=success");
} else {
    header("Location: ../setting.php?d=error");
}
