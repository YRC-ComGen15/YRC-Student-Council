<?php
ob_start();
require_once "../../config/conn.php";

// Variables from form
$title = $_POST['title'];
$link = $_POST['link'];
$id = $_POST['id'];
$icon = $_POST['icon'];

// SQL update
$stmt = $pdo->prepare("UPDATE menu SET title = :title, link = :link, icon = :icon WHERE id = :id");
$stmt->bindParam(':icon', $icon, PDO::PARAM_STR);
$stmt->bindParam(':title', $title, PDO::PARAM_STR);
$stmt->bindParam(':link', $link, PDO::PARAM_STR);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$result = $stmt->execute();

if ($result) {
    header("Location: ../menu.php?e=success");
} else {
    header("Location: ../menu.php?e=error");
}
