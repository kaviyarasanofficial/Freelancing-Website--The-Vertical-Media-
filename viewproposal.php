<?php
session_start();
include "php/conn.php"; // Include your database connection file
include "dashfunc.php"; // Include your custom functions file

// Check if the user is logged in
if (isset($_SESSION['dashboard_id']) && isset($_SESSION['user_email'])) {
    // Retrieve the user's email and ID from the session
    $user_email = $_SESSION['user_email'];
    $dashboard_id = $_SESSION['dashboard_id'];

    // Prepare the SQL query using a prepared statement
    $dashboardTable = "dashboard_" . $dashboard_id;

    // Sanitize the input to prevent SQL injection
    $dashboardTable = mysqli_real_escape_string($conn, $dashboardTable);
    $user_email = mysqli_real_escape_string($conn, $user_email);

    // Prepare the SQL query using a prepared statement
    $sql = "SELECT * FROM users WHERE Email = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("s", $user_email);
    $stmt->execute();

    // Get the result set
    $result = $stmt->get_result();

    // ... Rest of your code to process the result set and display the data
    // For example:
    

    $stmt->close();
} else {
    // Redirect to login page if the user is not logged in
    header("Location: login.php");
    exit;
}





$proposalResults = array(); // Initialize the proposal results array

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["viewproposal"])) {
    if (isset($_POST["id"])) {
        $proj_id = $_POST["id"];

        // Fetch project details using $proj_id
        $query = "SELECT * FROM newproj WHERE id = $proj_id";
        // Execute the query and fetch the project details
        $result = mysqli_query($conn, $query);
        $proj = mysqli_fetch_assoc($result);

        // Fetch proposal details from the betproject table for the specified project ID
        $proposalQuery = "SELECT * FROM betproject WHERE proj_id = $proj_id";
        $proposalResult = mysqli_query($conn, $proposalQuery);

        if ($proposalResult && mysqli_num_rows($proposalResult) > 0) {
            // Populate the proposal results array
            while ($proposal = mysqli_fetch_assoc($proposalResult)) {
                $proposalResults[] = $proposal;
            }
        } else {
            echo "No proposals found for this project.";
        }
    } else {
        echo "Project ID not provided.";
    }
}


?>




<!DOCTYPE html>
<html>
<head>
    <title>Individual Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.tailwindcss.com/v3.0.2/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="./style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

<style>
 body
{
    font-size: 15px;
    font-family: Raleway Light,Helvetica,Arial;
    line-height: 1.42857;
    font-weight: lighter;
}
p  /*Personalizado Bootstrap*/
{
  font-size: 15px;
  font-style: normal;
  color: #333333;
  line-height: 1.42857;
}
ul, ol /*Padrão Bootstrap*/
{
  margin-top: 0px;
  margin-bottom: 10px;
}
.nav /*Padrão Bootstrap*/
{
  padding-left: 0px;
  margin-bottom: 0px;
  list-style-type: none;
  list-style-image: none;
  list-style-position: outside;
}
.nav,
.nav-tabs {
  background-color: #007aff;
   
  height: 70px;
  color: white;
}
.nav-tabs > li /*Padrão Bootstrap*/
{
  float: left;
  margin-bottom: -1px;
}
nav,
.nav-tabs > li > a {
  color: #fff;
  text-decoration-line: none;
  position: relative;
  display: block;
  padding-top: 25px;
  padding-right: 15px;
  padding-bottom: 24px;
  padding-left: 15px;
}

nav,
.nav-tabs > li.active a,
nav,
.nav-tabs > li.active a:hover,
nav,
.nav-tabs > li.active a:focus {
  background-color: #0257b5;
  color: #fff;
  text-decoration-line: none;
}
.tab-content {
  color: white;
  background-color: #e6e6e6;
  padding: 5px 15px;
}
.tab-content > .tab-pane /*Padrão Bootstrap*/
{
  display: none;
}
.tab-content > .active /*Padrão Bootstrap*/
{
  display: block;
}
li.active a:before{
  border-color: #0257b5 transparent transparent transparent;
  border-style: solid;
  border-width: 10px 10px 0px 10px;
  content: "";
  display: block;
  left: calc(50% - 10px);
  position: absolute;
  width: 0px;
  top: 70px;
   z-index: 10;
}
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="mainNav">
        <div class="container">
          <a class="navbar-brand js-scroll-trigger" href="index.php">
            <h2></h2>
           <img style="height: 50px; width: 150px;" src="https://verticalmedia.co.in/img/logo.png" >
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="profileupdate.php">Profile <span class="sr-only"></span></a>
              </li>
               <!-- <li class="nav-item dropdown  main-menu">
                  <a class="nav-link dropdown-toggle" href="#" >Find Freelancers</a>
                  <div class="dropdown-menu main-menubox" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="./freelancer.html">Top Freelancer</a>
                    <a class="dropdown-item" href="#">Our Lawyers – Claudia Roberts Ellmann</a>
                  </div>
                </li> -->
                 <li class="nav-item dropdown main-menu">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Find Jobs
                    </a>
                    <ul class="dropdown-menu main-menubox" aria-labelledby="navbarDropdownMenuLink">
                      <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" data-toggle="dropdown" href="./alljobs.html">Software Jobs</a>
                        <ul class="dropdown-menu left77">
                          <a class="dropdown-item" href="alljobs.php">IT Projects</a>
                        </ul>
                      </li>
                      <li><a class="dropdown-item" href="#">Employment Management – Employers</a></li>       
                      <li><a class="dropdown-item" href="#">Employment Management – Employers</a></li>
                      <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" data-toggle="dropdown" href="#">Initial Consultation</a>
                        <ul class="dropdown-menu left131">
                          <a class="dropdown-item"  href="#">Initial Bankruptcy Consultation- Requested Documents</a>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li class="nav-item">
  <a class="nav-link" href="#"><?php echo $email; ?></a>
    </li>
              <li class="nav-item">
                <a href="postproject.php" class="btn btn-primary">Post a Project</a>
                <a href="logout.php" class="btn btn-primary">Logout</a>
              </li>
            </ul>
          </div>
        </div>
</nav>

<br><br>
   
<div class="container mt-5">
    <?php foreach ($proposalResults as $proposal): ?>
    <div class="container ">
        <div class="card ">
            <div class="card-header ">
                Proposals
            </div>
            <div class="card-body ">
                <h5 class="card-title"><?php echo $proposal['projtitle']; ?></h5>
                <p class="card-text">
                    Name: <?php echo $proposal['freelancername']; ?><br>
                    Freelancer Email: <?php echo $proposal['freelanceremail']; ?><br>
                    Project Title: <?php echo $proposal['projtitle']; ?><br>
                    Your Budget: <?php echo $proposal['sellamount']; ?><br>
                    Bid Amount: <?php echo $proposal['bidamount']; ?><br>
                    Within Deliver Days: <?php echo $proposal['deliverdayscount']; ?><br>
                    Proposal Details: <?php echo $proposal['proposal']; ?><br>
                    Country: <?php echo $proposal['country']; ?><br>
                    <!-- Display other relevant proposal details here -->
                </p>

                <!-- Form and buttons for proposal status -->
                <form action="php/bitstatus.php" method="post">
                    <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="hidden" name="bid_id" value="<?php echo $proposal['bid_id']; ?>">
                    <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="hidden" name="proj_id" value="<?php echo $proj_id; ?>">

                    <?php if ($proposal['status'] === 'Approved'): ?>
                        <button class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" disabled>Approved</button>
                        <button class="text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900" type="submit" name="decline">Decline</button>
                    <?php elseif ($proposal['status'] === 'Declined'): ?>
                        <button class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit" name="approve">Approve</button>
                        <button class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" type="submit" name="decline" disabled>Declined</button>
                    <?php else: ?>
                        <button class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit" name="approve">Approve</button>
                        <button class="text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900" type="submit" name="decline">Decline</button>
                    <?php endif; ?>

                </form>
            </div>
        </div>
    </div>
    <hr> <!-- Adding a horizontal line between proposals -->
    <?php endforeach; ?>
</div>




</body>
</html>
