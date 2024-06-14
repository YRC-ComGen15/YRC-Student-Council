<?php

require_once "./conn.php";

try {
    // Prepare the SQL statement with placeholders for data
    $sql = "INSERT INTO viewer (date) VALUES (:date)";
    $stmt = $conn->prepare($sql);

    // Get data to be inserted (replace with your data retrieval logic)
    $date = "value for column 1";

    // Bind the data to the placeholders
    $stmt->bindParam(':date', $data1);

    // Execute the prepared statement
    $stmt->execute();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
