<?php

require_once "./conn.php";

// Check if the "mobile" word exists in User-Agent 
$isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"));

// Check if the "tablet" word exists in User-Agent 
$isTab = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "tablet"));

// Platform check  
$isWin = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "windows"));
$isAndroid = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "android"));
$isIPhone = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "iphone"));
$isIPad = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "ipad"));
$isIOS = $isIPhone || $isIPad;

if ($isMob) {
    if ($isTab) {
        $device = "Tablet";
    } else {
        echo 'Using Mobile Device...';
        $device = "Moblie";
    }
} else {
    $device = "Desktop";
}

if ($isIOS) {
    $os = "ios";
} elseif ($isAndroid) {
    $os = "androind";
} elseif ($isWin) {
    $os = "window";
}

echo $device;
echo $os;

try {
    // Prepare the SQL statement with placeholders for data
    $sql = "INSERT INTO viewer (date, info, day) VALUES (:date, :info, :day)";
    $stmt = $pdo->prepare($sql);

    // Get data to be inserted (replace with your data retrieval logic)
    $date = date("d-m-Y");
    $info = "Device:" . $device . " OS:" . $os;
    $day = date("l");

    // Bind the data to the placeholders
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':info', $info);
    $stmt->bindParam(':day', $day);

    // Execute the prepared statement
    $stmt->execute();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
