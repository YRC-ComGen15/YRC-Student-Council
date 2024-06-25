<?php
ob_start();

require_once "./config/conn.php";

$id = 8;

$sql = 'SELECT * FROM menu WHERE id = :id';
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);

// สำหรับการดึงข้อมูลแถวเดียว
$data = $stmt->fetch(PDO::FETCH_ASSOC);

header("Location: " . $data['link']);  // Original line

// Check if data was fetched before redirecting
if ($data) {
  header("Location: " . $data['link']); // Use dot concatenation for clarity
} else {
  // Handle the case where no data was found (e.g., display an error message)
  echo "No menu item found with ID: 8";
}

