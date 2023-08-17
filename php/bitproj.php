<?php

session_start();

include "conn.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo "Form not submitted.";
    exit();
}

// Retrieve project details from the database and assign to $proj
$id = $_POST['id'];
$query = "SELECT * FROM newproj WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    $proj = $result->fetch_assoc();
} else {
    echo "Project not found.";
    exit();
}

$stmt->close();

// Print form field values for debugging

$bidamount = $_POST['bitamount'];
$deliverdayscount = $_POST['deliverydays'];
$proposal = $_POST['proposal'];
$freelanceremail = $_SESSION['user_email'];

// echo "ID: $id<br>";
// echo "Bid Amount: $bidamount<br>";
// echo "Delivery Days: $deliverdayscount<br>";
// echo "Proposal: $proposal<br>";
// echo "Freelancer Email: $freelanceremail<br>";

// Retrieve freelancer's name and country from the user table
$selectFreelancerQuery = "SELECT name, country FROM users WHERE email = ?";
$stmtSelectFreelancer = $conn->prepare($selectFreelancerQuery);
$stmtSelectFreelancer->bind_param("s", $freelanceremail);
$stmtSelectFreelancer->execute();
$resultSelectFreelancer = $stmtSelectFreelancer->get_result();

if ($resultSelectFreelancer && $resultSelectFreelancer->num_rows > 0) {
    $freelancerData = $resultSelectFreelancer->fetch_assoc();
    $freelancername = $freelancerData['name'];
    $Country = $freelancerData['country'];
} else {
    echo "Freelancer not found.";
    exit();
}

$stmtSelectFreelancer->close();

// Insert the bid into the database using prepared statement
$insertQuery = "INSERT INTO betproject (proj_id, projtitle, projselleremail, sellamount, projdate, freelancername, country, bidamount, deliverdayscount, proposal, freelanceremail) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmtInsert = $conn->prepare($insertQuery);
if (!$stmtInsert) {
    echo "Error in prepared statement: " . $conn->error; // Print error message
    exit();
}

$stmtInsert->bind_param(
    "issdssssiss",
    $id,
    $proj['Name'], // Use 'Name' from 'newproj' table
    $proj['email'],
    $proj['budget'],
    $proj['date'],
    $freelancername,
    $Country,
    $bidamount,
    $deliverdayscount,
    $proposal,
    $freelanceremail
);

if ($stmtInsert->execute()) {
    $alertMessage = "Bid submitted successfully.";
    echo "<script>alert('$alertMessage'); window.location.href = '../alljobs.php';</script>";
} else {
    $errorMessage = "Error: Unable to submit bid. " . $stmtInsert->error;
    echo "<script>alert('$errorMessage');</script>";
}

$stmtInsert->close();
?>
