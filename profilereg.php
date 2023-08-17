<?php
// Assuming you have already established a MySQL database connection
include "php/conn.php";

$mysqli = new mysqli("localhost", "root", "", "free");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
 
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the email and name values from the form
  $email = $_POST["email"];
  $name = $_POST["name"];
  $Country = $_POST["Country"];
  $Street = $_POST["Street"];
  $City = $_POST["City"];
  $State = $_POST["State"];
  $ZIP = $_POST["ZIP"];

  // Perform any necessary validation on the email and name values

  // Update the name value in the MySQL table based on the email
  $query = "UPDATE users SET name = ?, Country = ?, Street = ?, City = ?, State = ?, ZIP = ? WHERE email = ?";
  $stmt = $mysqli->prepare($query);
  $stmt->bind_param("sssssss", $name, $Country, $Street, $City, $State, $ZIP, $email);
  $stmt->execute();

  // Check if the update was successful
  if ($stmt->affected_rows > 0) {
    header("Location: profileupdate.php");
  } else {
    echo "Error storing name value.";
  }

  // Close the statement and database connection
  $stmt->close();
  $mysqli->close();
}
?>
