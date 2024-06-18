<?php
ob_start();
require_once "../../../config/conn.php";

$category = $_POST['catagory'];

// SQL insert
$stmt = $pdo->prepare("INSERT INTO learn_category (category) VALUES (:category)");
$stmt->bindParam(':category', $category, PDO::PARAM_STR);
$result = $stmt->execute();

if ($result) {
    header("Location: ../index.php?a=success");
} else {
    header("Location: ../index.php?a=error");
}
