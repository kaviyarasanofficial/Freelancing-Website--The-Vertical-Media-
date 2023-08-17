<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <style>
.material-symbols-outlined {
  display:none;
  color:green;
}
</style>
</head>
<body>
  
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database= "free";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die('<span class="material-symbols-outlined">
  cloud_off
  </span> ' . $conn->connect_error);
}
echo '<span class="material-symbols-outlined">database</span>';
?>
</body>
</html>

