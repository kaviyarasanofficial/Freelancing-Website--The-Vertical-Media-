<?php
include "conn.php"; // Include your database connection

if (isset($_POST['submit'])) {
    $proj_id = $_POST['proj_id'];
    $name = $_POST['Name'];
    $description = $_POST['Description'];
    $skills = $_POST['skills'];
    $budget = $_POST['budget'];
    $payMethod = $_POST["paymethod"];
    $catagories = $_POST["catagories"];
    $date = $_POST["date"];
    $email = $_POST["email"];

    // Check if a new thumbnail was uploaded
    if ($_FILES['thumbnail']['name'] !== "") {
        $targetDir = "thumbnails/";
        $thumbnail = $_FILES['thumbnail']['name'];
        $thumbnailTempName = $_FILES['thumbnail']['tmp_name'];
        $thumbnailPath = $targetDir . $thumbnail;

        // Move the uploaded thumbnail
        move_uploaded_file($thumbnailTempName, $thumbnailPath);
    } else {
        // If no new thumbnail was uploaded, keep the old thumbnail URL
        $sqlSelect = "SELECT thumbnail_url FROM newproj WHERE id=?";
        $stmtSelect = $conn->prepare($sqlSelect);
        $stmtSelect->bind_param("i", $proj_id);
        $stmtSelect->execute();
        $stmtSelect->bind_result($oldThumbnailURL);
        $stmtSelect->fetch();
        $thumbnailPath = $oldThumbnailURL;
        $stmtSelect->close();
    }

    // Prepare the update SQL query
    $sql = "UPDATE newproj SET Name=?, Description=?, Skills=?, Budget=?, thumbnail_url=?, payment_method=?, Catagories=?, Date=?, Email=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssdsssssi", $name, $description, $skills, $budget, $thumbnailPath, $payMethod, $catagories, $date, $email, $proj_id);

    // Execute the update
    if ($stmt->execute()) {
        // Update successful, redirect or show success message
        header("Location: ../myjobs.php");
        exit;
    } else {
        // Update failed, show error message or handle accordingly
        echo "Update failed: " . $stmt->error;
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>
