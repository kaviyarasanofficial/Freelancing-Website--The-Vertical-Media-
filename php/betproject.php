<?php

include "php/conn.php";

// Check if the project ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch project details from the database based on the id
    // Replace this with your actual database query code
    $query = "SELECT * FROM newproj WHERE id = $id";
    // Execute the query and fetch the result
    $result = mysqli_query($conn, $query);
    
    // Check if the query was successful and if there's a project with the provided id
    if ($result && mysqli_num_rows($result) > 0) {
        $proj = mysqli_fetch_assoc($result);
        
        // Fetch more details using the email obtained from the fetched project
        $email = $proj['email'];
        $emailQuery = "SELECT * FROM users WHERE email = '$email'";
        $emailResult = mysqli_query($conn, $emailQuery);
        
        if ($emailResult && mysqli_num_rows($emailResult) > 0) {
            $emailDetails = mysqli_fetch_assoc($emailResult);
        }
    } else {
        // Handle the case when the project with the provided id doesn't exist
        echo "Project not found.";
    }
} else {
    // Handle the case when id is not provided in the URL
    echo "Project ID is missing.";
}


?>