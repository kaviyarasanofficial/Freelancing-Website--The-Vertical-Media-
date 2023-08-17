<?php
// delete.php

include "conn.php"; // Connect to the database

if (isset($_GET['proj_id'])) {
    $proj_id = urldecode($_GET['proj_id']);

    // Use prepared statements to avoid SQL injection
    $stmt = $conn->prepare("SELECT * FROM betproject WHERE proj_id = ?");
    $stmt->bind_param("s", $proj_id);
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
    $delete_stmt = $conn->prepare("DELETE FROM betproject WHERE proj_id = ? LIMIT 1");
    $delete_stmt->bind_param("s", $proj_id);
    $delete_stmt->execute();
    $delete_stmt->close();

    header("Location: ../bedprojects.php");
} else {
    // No id provided in the URL
    echo "Invalid request. Please provide an 'id' parameter.";
}

$conn->close();
?>