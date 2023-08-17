<?php
include "conn.php"; // Connect to the database

if (isset($_POST['delete']) && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Perform the deletion operation
    $sql = "DELETE FROM newproj WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Successful deletion, you can redirect back to the main page or display a success message
        header("Location: ../myjobs.php?delete_success=1");
        exit;
    } else {
        // Delete operation failed
        header("Location: ../myjobs.php?delete_error=1");
        exit;
    }

    $stmt->close();
}

$conn->close();
?>
