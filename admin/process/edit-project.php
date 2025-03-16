<?php
ob_start();
require_once "../../config/conn.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $link = $_POST['link'];
    $id = $_POST['id'];
    $existing_icon = $_POST['existing_icon']; // Keep old image if no new file is uploaded

    // Handle Image Upload
    if (!empty($_FILES['icon']['name'])) {
        $target_dir = "../../img/";
        $icon_name = time() . "_" . basename($_FILES["icon"]["name"]); // Unique filename
        $target_file = $target_dir . $icon_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Allowed file types
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($imageFileType, $allowed_types)) {
            // Move uploaded file
            if (move_uploaded_file($_FILES["icon"]["tmp_name"], $target_file)) {
                $icon = $icon_name;
                // Optionally delete old image if needed
                if (!empty($existing_icon) && file_exists($target_dir . $existing_icon)) {
                    unlink($target_dir . $existing_icon);
                }
            } else {
                header("Location: ../project.php?e=upload_error");
                exit();
            }
        } else {
            header("Location: ../project.php?e=invalid_file");
            exit();
        }
    } else {
        $icon = $existing_icon; // Use existing image if no new one uploaded
    }

    // SQL update
    $stmt = $pdo->prepare("UPDATE project SET title = :title, link = :link, icon = :icon WHERE id = :id");
    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':link', $link, PDO::PARAM_STR);
    $stmt->bindParam(':icon', $icon, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $result = $stmt->execute();

    if ($result) {
        header("Location: ../project.php?e=success");
    } else {
        header("Location: ../project.php?e=error");
    }
}
?>