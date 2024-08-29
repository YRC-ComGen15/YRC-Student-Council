<?php
// เชื่อมต่อฐานข้อมูล
require_once "./config/conn.php";

try {
    // กำหนดโหมดข้อผิดพลาดของ PDO เป็นข้อยกเว้น
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // รับวันที่ปัจจุบันและวันที่ของสัปดาห์
    $currentDate = date("Y-m-d");
    $currentDayOfWeek = date("l"); // 'l' ให้วันที่เต็ม เช่น 'Monday'

    // ตรวจสอบว่ามีข้อมูลในวันปัจจุบันแล้วหรือยัง
    $stmt = $pdo->prepare("SELECT * FROM visitors WHERE visit_date = :visit_date");
    $stmt->bindParam(':visit_date', $currentDate);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // มีข้อมูลแล้ว เพิ่มค่า visit_count
        $updateStmt = $pdo->prepare("UPDATE visitors SET visit_count = visit_count + 1 WHERE visit_date = :visit_date");
        $updateStmt->bindParam(':visit_date', $currentDate);
        $updateStmt->execute();
    } else {
        // ยังไม่มีข้อมูล เพิ่มรายการใหม่
        $insertStmt = $pdo->prepare("INSERT INTO visitors (visit_date, day_of_week, visit_count) VALUES (:visit_date, :day_of_week, 1)");
        $insertStmt->bindParam(':visit_date', $currentDate);
        $insertStmt->bindParam(':day_of_week', $currentDayOfWeek);
        $insertStmt->execute();
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
