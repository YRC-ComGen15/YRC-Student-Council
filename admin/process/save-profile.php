<?php
// เริ่มต้นการทำงานของ session เพื่อให้สามารถใช้ตัวแปร $_SESSION ได้
session_start();

// ตรวจสอบว่าผู้ใช้เข้าสู่ระบบหรือไม่
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php"); // ถ้าไม่ได้เข้าสู่ระบบ, จะถูกเปลี่ยนหน้าไปยังหน้า login
    exit();
}

// รับค่าจากฟอร์ม
$name = $_POST['name'] ?? '';
$password = $_POST['password'] ?? '';

// เชื่อมต่อฐานข้อมูล
require_once "../../config/conn.php";

try {
    // การตั้งค่า PDO ให้แสดงข้อผิดพลาดในกรณีที่เกิดข้อผิดพลาด
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // เตรียมคำสั่ง SQL สำหรับอัปเดตข้อมูล
    $sql = "UPDATE admin SET name = :name, password = :password WHERE username = :username";

    // เตรียม statement
    $stmt = $pdo->prepare($sql);

    // กำหนดค่าให้กับตัวแปร SQL
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':username', $_SESSION['username']);

    // ดำเนินการ statement
    if ($stmt->execute()) {
        echo "<script>
            alert('อัปเดตข้อมูลสำเร็จ!');
            window.location.href = '../profile.php'; // เปลี่ยนหน้าไปยังหน้าโปรไฟล์ (หรือหน้าอื่นๆ ที่ต้องการ)
        </script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาดในการอัปเดตข้อมูล!');</script>";
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// ปิดการเชื่อมต่อฐานข้อมูล
$pdo = null;
?>
