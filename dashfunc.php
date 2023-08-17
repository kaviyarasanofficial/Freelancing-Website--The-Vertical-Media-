<?php
$dashboardId = $_SESSION['dashboard_id'];
$email = $_SESSION['user_email'];

// Construct the SQL query using placeholders
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);

// Bind the email value and execute the query
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();


?>
