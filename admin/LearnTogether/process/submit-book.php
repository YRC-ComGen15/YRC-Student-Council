<?php

require_once"../../../config/conn.php";

$id = $_GET['id'];
$status = "active";

// SQL update
$stmt = $pdo->prepare("UPDATE learn_booksharing SET status = :status WHERE id = :id");
$stmt->bindParam(':status', $status, PDO::PARAM_STR);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$result = $stmt->execute();

if ($result) {
    header("Location: ../index.php?a=success");
} else {
    header("Location: ../index.php?a=error");
}
