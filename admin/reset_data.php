<?php
ob_start();
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: ./login.php");
    exit;
}

// Database connection
require_once "../config/conn.php";

try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Delete all visitor data
    $sql_delete = "DELETE FROM visitors";
    $pdo->exec($sql_delete);

    // Redirect back to the home page with a success status
    header("Location: ./index.php?a=reset_success");
    exit;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
