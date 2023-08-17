<?php
// conn.php (include your database connection code here)
include "conn.php";

if (isset($_POST['submit'])) {
    // Get the new category name from the form
    $category_name = $_POST['Category_name'];

    // Prepare the SQL query using prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO catagorie (Catagorie_Name) VALUES (?)");

    // Check if the prepare() call was successful
    if ($stmt === false) {
        die("Error preparing query: " . $conn->error);
    }

    // Bind the parameter to the prepared statement
    $stmt->bind_param("s", $category_name);

    // Execute the query
    if ($stmt->execute()) {
        // The category was successfully inserted
        header("Location: ../addcat.php");
    } else {
        // Error occurred while inserting the category
        echo "Error inserting category: " . $stmt->error;
    }

    // Close the prepared statement and the database connection
    $stmt->close();
    $conn->close();
}
?>

<!-- The rest of your HTML code -->
