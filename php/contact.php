<?php

$name = $_POST['name'];
$subject = $_POST['subject'];
$email = $_POST['email'];

$message = $_POST['message'];

// Create a connection to the MySQL database
$db = new PDO('mysql:host=localhost;dbname=free', 'root', '');

// Insert the form data into the database
$sql = "INSERT INTO contact (Name, Email, Subjects, Message) VALUES ('$name', '$email', '$subject', '$message')";
$db->exec($sql);


$message = "Our Team Contact Soon,Thanks For Contacting ";


echo "<script>alert('$message');</script>";
header('Location: ../contact.php');

?>
