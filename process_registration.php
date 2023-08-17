

<?php
// ... previous code ...
include "php/conn.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the email and password from the form
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate the email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Error: Invalid email format";
        exit;
    }

    // Validate the password (you can add more checks based on your requirements)
    if (strlen($password) < 6) {
        echo "Error: Password should be at least 6 characters long";
        exit;
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // ... rest of the code ...

    // Insert user data into the "users" table
    $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $hashedPassword);

    if ($stmt->execute()) {
        // Get the inserted user ID (dashboard_id)
        $dashboardId = $stmt->insert_id;

        // ... rest of the code ...
        header("Location: login.php");
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
