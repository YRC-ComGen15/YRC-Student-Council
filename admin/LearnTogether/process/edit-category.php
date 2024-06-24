<?php

require_once"../../../config/conn.php";

$id = $_POST['id'];
$category = $_POST['category'];

// SQL update
$stmt = $pdo->prepare("UPDATE learn_category SET category = :category WHERE id = :id");
$stmt->bindParam(':category', $category, PDO::PARAM_STR);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$result = $stmt->execute();

if ($result) {
    header("Location: ../index.php?a=success");
} else {
    header("Location: ../index.php?a=error");
}
