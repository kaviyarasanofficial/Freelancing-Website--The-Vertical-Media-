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
    while ($row = $result->fetch_assoc()) {
        $Country = $row['Country'];
        $Street = $row['Street'];
        $City = $row['City'];
        $State = $row['State'];
        $ZIP = $row['ZIP'];
        // $name = $row['Name']; // Assuming the name column in your table is named 'Name'

        // ... Continue with the rest of your processing
    }

    $stmt->close();
} else {
    // Redirect to login page if the user is not logged in
    header("Location: login.php");
    exit;
}

# Book helper function
include "php/projfunc.php";
$proj = get_all_myproj($conn,$user_email);



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

<br>
   


    <ul class="nav nav-tabs mt-5">
        <li class="active">
          <a href="#tab1" data-toggle="tab">Home</a>
        </li>
        <li>
          <a href="#tab2 myproj.php" data-toggle="tab" onclick="navigateToURL1(); ">My Projects </a>
        </li>
        <li>
          <a href="#tab3" data-toggle="tab">My Project Proposals</a>
        </li>
        <li>
          <a href="#tab4" data-toggle="tab">Settings</a>
        </li>
        <li>
          <a href="#tab5" data-toggle="tab">Settings1</a>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab1">
          <p><h2>Welcome, <?php echo  $email; ?></h2>
  
    <p>This is your individual dashboard.</p>
    </p>
        </div>
        <div class="tab-pane" id="tab2">
          




        </div>
        <div class="tab-pane" id="tab3">
         
        <div class="container">
    <div class="row jobscard">
        <?php $i = 0; ?>
        <?php foreach ($proj as $projs): ?>
            <?php
            // Check if there are proposals for this project
            $proposalQuery = "SELECT * FROM betproject WHERE proj_id = {$projs['id']}";
            $proposalResult = mysqli_query($conn, $proposalQuery);
            
            // Skip displaying this project if there are no proposals
            if ($proposalResult && mysqli_num_rows($proposalResult) === 0) {
                continue;
            }
            ?>
            <div class="col-md-3 col-sm-6 item">
                <div class="card item-card card-block">
                    <?php
                    // Get the thumbnail URL from the $projs array
                    $thumbnail_url = $projs['thumbnail_url'];
                    // Remove the first occurrence of 'thumbnails/' in the URL to fix the duplication
                    $thumbnail_url = preg_replace('/^thumbnails\//', '', $thumbnail_url);
                    ?>
                    <img src="php/thumbnails/<?= $thumbnail_url ?>" alt="Photo of sunset">
                    <h5 class="item-card-title mt-3 mb-3"><?= $projs['Name'] ?></h5>
                    
                    <p class="card-text">
                        <?= $projs['catagories'] ?><br>
                        <?= $projs['budget'] ?>
                    </p>
                    <form method="post" action="viewproposal.php">
                        <!-- A separate PHP script to handle project deletion -->
                        <input type="hidden" name="id" value="<?= $projs['id'] ?>">
                        <!-- Pass the project ID as a hidden input -->
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" name="viewproposal">View proposal</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>



        </div>
        <div class="tab-pane" id="tab4">
          <p>Tab 4 content goes here...</p>
        </div>
        <div class="tab-pane" id="tab5">
          <p>Tab 5 content goes here...</p>
        </div>

  </div>
  
  
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    

<br><br>
<a href="logout.php">Logout</a>
    <a href="profileupdate.php">profile</a>

    <script>
function navigateToURL1() {
    // Logic to navigate to URL 1
    window.location.href = 'myjobs.php';
}

</script>
Please note that this approach may not be the most user-friendly, as it might result in quick redirections, potentially preventing the user from seeing the content of the first URL before being redirected to the second URL. Consider your user experience and requirements before implementing such behavior.

If you have a specific scenario in mind or need more guidance, feel free to provide additional details so that I can provide a more tailored solution.






</body>
</html>
