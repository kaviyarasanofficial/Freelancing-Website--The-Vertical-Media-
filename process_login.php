<?php
session_start();
include "php/conn.php";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user data from the login form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and execute the SQL query to retrieve user data
    $stmt = $conn->prepare("SELECT dashboard_id, email, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // Fetch the user data
        $row = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Successful login, store user data in session
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['dashboard_id'] = $row['dashboard_id']; // Store the user's dashboard ID

            // Redirect to the user's individual dashboard
            header("Location: dashboard.php");
            exit;
        } else {
            // Invalid password, show alert message
            echo "<script>alert('Invalid password. Please try again.');</script>";
            echo "<script>window.location.href = 'login.php';</script>";
        }
    } else {
        // User not found, show alert message
        echo "<script>alert('User not found. Please try again.');</script>";
        echo "<script>window.location.href = 'login.php';</script>";
    }
} else {
    // Redirect to login page if the form is not submitted
    header("Location: login.php");
    exit;
}
?>
