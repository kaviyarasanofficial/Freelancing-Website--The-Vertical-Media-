<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
// delete.php

include "conn.php"; // Connect to the database

if (isset($_GET['dashboard_id'])) {
    $id = urldecode($_GET['dashboard_id']);

    // Use prepared statements to avoid SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE dashboard_id = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        // The record with the given id does not exist, so do nothing
        echo "Record not found.";
        $stmt->close();
        $conn->close();
        exit;
    }

    // Delete the record with the given id
    $delete_stmt = $conn->prepare("DELETE FROM users WHERE dashboard_id = ? LIMIT 1");
    $delete_stmt->bind_param("s", $id);
    $delete_stmt->execute();
    $delete_stmt->close();

    header("Location: ../users.php");
} else {
    // No id provided in the URL
    echo "Invalid request. Please provide an 'id' parameter.";
}

$conn->close();
?>

</body>
</html>

