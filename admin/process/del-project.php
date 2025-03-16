<?php
session_start();
require_once "../../config/conn.php"; // เชื่อมต่อฐานข้อมูล

// ตรวจสอบว่ามีค่า ID ที่ส่งมาหรือไม่
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // ดึงชื่อไฟล์เพื่อลบออกจากโฟลเดอร์
    $stmt = $pdo->prepare("SELECT icon FROM project WHERE id = ?");
    $stmt->execute([$id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $filePath = "../../img/" . $row['icon']; // ที่อยู่ของไฟล์ภาพ

        // ลบข้อมูลจากฐานข้อมูล
        $stmt = $pdo->prepare("DELETE FROM project WHERE id = ?");
        if ($stmt->execute([$id])) {
            // ลบไฟล์ออกจากโฟลเดอร์
            if (file_exists($filePath)) {
                unlink($filePath); // ลบไฟล์
            }
            header("Location: ../index.php?a=deleted");
            exit();
        } else {
            header("Location: ../index.php?a=error");
            exit();
        }
    } else {
        header("Location: ../index.php?a=notfound");
        exit();
    }
} else {
    header("Location: ../index.php");
    exit();
}
?>