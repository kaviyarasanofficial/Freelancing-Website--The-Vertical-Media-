<?php
include "conn.php"; // Connect to the database

if (isset($_POST['submit'])) {
    $Name = $_POST['Name'];
    $Description = $_POST['Description'];
    $skills = $_POST['skills'];
    $budget = $_POST['budget'];
    $paymentMethod = $_POST["paymethod"];
    $catagories = $_POST["catagories"];





    // File upload handling
    $targetDir = "thumbnails/";
    $thumbnail = $_FILES['thumbnail']['name'];
    $thumbnailTempName = $_FILES['thumbnail']['tmp_name'];
    $thumbnailPath = $targetDir . $thumbnail;

    echo "Uploaded file name: " . $thumbnail . "<br>";
    echo "Temporary file path: " . $thumbnailTempName . "<br>";

    // Get the file extension
    $thumbnailExtension = strtolower(pathinfo($thumbnailPath, PATHINFO_EXTENSION));

    // Supported image formats
    $allowedFormats = array('jpeg', 'jpg', 'png', 'gif');

    if (!in_array($thumbnailExtension, $allowedFormats)) {
        echo "Error: Unsupported file format.";
        exit;
    }

    if (move_uploaded_file($thumbnailTempName, $thumbnailPath)) {
        // Thumbnail uploaded successfully
        // Now, create a thumbnail (you need to install and enable GD library for this)
        $thumbnailWidth = 150; // Adjust the width of the thumbnail as per your requirement
        $thumbnailHeight = 150; // Adjust the height of the thumbnail as per your requirement

        if ($thumbnailExtension == 'jpeg' || $thumbnailExtension == 'jpg') {
            $sourceImage = imagecreatefromjpeg($thumbnailPath);
        } elseif ($thumbnailExtension == 'png') {
            $sourceImage = imagecreatefrompng($thumbnailPath);
        } elseif ($thumbnailExtension == 'gif') {
            $sourceImage = imagecreatefromgif($thumbnailPath);
        }

        if ($sourceImage === false) {
            echo "Error: Failed to load the image.";
            exit;
        }

        $thumbnailImage = imagecreatetruecolor($thumbnailWidth, $thumbnailHeight);
        imagecopyresampled($thumbnailImage, $sourceImage, 0, 0, 0, 0, $thumbnailWidth, $thumbnailHeight, imagesx($sourceImage), imagesy($sourceImage));

        // Save the thumbnail to the same directory
        $thumbnailFilename = pathinfo($thumbnailPath, PATHINFO_FILENAME) . '_thumb.' . $thumbnailExtension;
        $thumbnailPath = $targetDir . $thumbnailFilename;

        if ($thumbnailExtension == 'jpeg' || $thumbnailExtension == 'jpg') {
            imagejpeg($thumbnailImage, $thumbnailPath);
        } elseif ($thumbnailExtension == 'png') {
            imagepng($thumbnailImage, $thumbnailPath);
        } elseif ($thumbnailExtension == 'gif') {
            imagegif($thumbnailImage, $thumbnailPath);
        }

        // Free up memory
        imagedestroy($sourceImage);
        imagedestroy($thumbnailImage);

        // Insert data into the database
        $sql = "INSERT INTO `newproj` (`Name`, `Description`, `thumbnail_url`, `skills`, `payment_method`, `catagories`, `budget`)
        VALUES ('$Name', '$Description', '$thumbnailPath', '$skills', '$paymentMethod', '$catagories', '$budget')";

        $result = $conn->query($sql);

        if ($result === TRUE) {
            // Redirect to a success page or do whatever you want
            header("Location: ../postproj.php?success=1");
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error uploading the thumbnail.";
    }

    $conn->close();
}
?>
