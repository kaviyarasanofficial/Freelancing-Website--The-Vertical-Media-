<?php

include "pages/php/conn.php";
// Query to get the user count
$sql = "SELECT COUNT(*) as user_count FROM users"; // Replace "users" with your actual table name

// Execute the query
$result = $conn->query($sql);

// Check if the query was successful
if ($result === false) {
    die("Error: " . $conn->error);
}

// Fetch the result as an associative array
$row = $result->fetch_assoc();

// Get the user count
$userCount = $row['user_count'];
?>




<?php

include "pages/php/conn.php";
// Query to get the user count
$sql = "SELECT COUNT(*) as proj_count FROM newproj"; // Replace "users" with your actual table name

// Execute the query
$result = $conn->query($sql);

// Check if the query was successful
if ($result === false) {
    die("Error: " . $conn->error);
}

// Fetch the result as an associative array
$row = $result->fetch_assoc();

// Get the user count
$proj_count = $row['proj_count'];
?>


<?php

include "pages/php/conn.php";
// Query to get the user count
$sql = "SELECT COUNT(*) as catagorie_name FROM catagorie"; // Replace "users" with your actual table name

// Execute the query
$result = $conn->query($sql);

// Check if the query was successful
if ($result === false) {
    die("Error: " . $conn->error);
}

// Fetch the result as an associative array
$row = $result->fetch_assoc();

// Get the user count
$catagorie_name = $row['catagorie_name'];
?>

<?php

include "pages/php/conn.php";
// Query to get the user count
$sql = "SELECT COUNT(*) as contact FROM contact"; // Replace "users" with your actual table name

// Execute the query
$result = $conn->query($sql);

// Check if the query was successful
if ($result === false) {
    die("Error: " . $conn->error);
}

// Fetch the result as an associative array
$row = $result->fetch_assoc();

// Get the user count
$contact = $row['contact'];
?>