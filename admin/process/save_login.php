<?php

ob_start();
require_once("../../config/conn.php");

session_start();

$username = $_POST['username'];
$stmt = $pdo->prepare('SELECT * FROM admin WHERE username = :username');
$stmt->execute(['username' => $username]);
$user = $stmt->fetch();

if ($_POST['password'] == $user['password']) {
    $_SESSION['UserID'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    // echo "Login successful! Welcome, " . $_SESSION['username'];
    header("Location: ../index.php");
} else {
    echo "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง ";
    echo "<a href='../login.php'>กลับไปหน้าล็อกอิน</a>";
    echo "อาจจะไม่สวยนะงับงานเร่ง😭😭";
}
