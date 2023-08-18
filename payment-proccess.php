<?php
$data = [ 
'user_id' => '1',
'payment_id' => $_POST['razorpay_payment_id'],
'amount' => $_POST['totalAmount'],
'product_id' => $_POST['product_id'],
];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "free";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize and validate user inputs
$user_id = 1; // You can replace this with your authentication logic
$payment_id = $conn->real_escape_string($_POST['razorpay_payment_id']);
$amount = floatval($_POST['totalAmount']);
$product_id = $conn->real_escape_string($_POST['product_id']);

// Create the SQL INSERT query
$sql = "INSERT INTO payments (user_id, razorpay_payment_id, totalAmount, product_id)
        VALUES ('$user_id', '$payment_id', '$amount', '$product_id')";

// Execute the query
if ($conn->query($sql) === TRUE) {
    $arr = array('msg' => 'Payment successfully credited', 'status' => true);
} else {
    $arr = array('msg' => 'Error: ' . $conn->error, 'status' => false);
}

// Close the database connection
$conn->close();

// Return the response
echo json_encode($arr);
?>