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



# Book helper function
include "php/projfunc.php";
$proj = get_all_myproj($conn,$user_email);





} else {
    // Redirect to login page if the user is not logged in
    header("Location: login.php");
    exit;
}



if (isset($_SESSION['payment_status']) && $_SESSION['payment_status'] === 'paid') {
  $buttonText = 'Paid';
  $buttonClass = 'paid_button'; // Add a custom CSS class for styling if needed
} else {
  $buttonText = 'Pay Amount';
  $buttonClass = 'buy_now';
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
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
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
        <li >
              <a href="#tab1" onclick="window.location.href='dashboard.php';" data-toggle="tab">Home</a>
        </li>
        <li class="active">
          <a href="#tab2" data-toggle="tab">My Projects </a>
        </li>
        <li>
          <a href="#tab3" data-toggle="tab">My Project Proposals</a>
        </li>
        <li>
          <a href="#tab4" data-toggle="tab">My Propsals</a>
        </li>
        <li>
          <a href="#tab5" data-toggle="tab">Settings2</a>
        </li>
        
      </ul>
      <div class="tab-content">
        <div class="tab-pane "  id="tab1">
          
          <p><h2>Welcome, <?php echo $dashboard_id; ?>!  <?php echo $user_name; ?></h2>
          <h2><?php echo $Country; ?>! </h2>
          <!-- <p>This is your individual dashboard.</p> -->
      </p>
        </div>
        <div class="tab-pane active" id="tab2">
      <div class="container  ">
 <div class="row jobscard">
            <?php $i = 0; ?>
            <?php foreach ($proj as $projs): ?>
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
                            <br>
                            <br><a href="javascript:void(0)" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 buy_now" data-amount=" <?= $projs['budget'] ?>" data-id="1">Pay Amount</a> <br>
                        </p>
                        <form method="post" action="php/delete_project.php"> <!-- A separate PHP script to handle project deletion -->
              <input type="hidden" name="id" value="<?= $projs['id'] ?>"> <!-- Pass the project ID as a hidden input -->
              <button type="submit"  class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-4 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" name="delete">Delete</button>
              <a href="editproject.php?id=<?=$projs['id']?>" 
              class="text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
					   Edit</a>
              </form>

   

                    </div>
                </div>

                <?php
                // Increment the counter and check if it's divisible by 4
                $i++;
                if ($i % 4 === 0) {
                    // If it's divisible by 4, close the current row and start a new one
                    echo '</div><div class="row jobscard">';
                }
                ?>

            <?php endforeach; ?>
            <?php if (isset($_GET['delete_success'])) : ?>
    <div class="alert alert-success" role="alert">
        Project deleted successfully.
    </div>
<?php elseif (isset($_GET['delete_error'])) : ?>
    <div class="alert alert-danger" role="alert">
        An error occurred while deleting the project.
    </div>
<?php endif; ?>
        </div>
</div>
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






          
        </div>
        <div class="tab-pane" id="tab4">
          <p>
            



          
          </p>
        </div>
        <div class="tab-pane" id="tab5">
          <p>Tab 5 content goes here...</p>
        </div>

  </div>
 
  
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery library -->

<script>
$(document).ready(function() {
    $('body').on('click', '.buy_now', function(e) {
        var paymentButton = $(this); // Store the clicked button element
        var totalAmount = paymentButton.attr("data-amount");
        var product_id = paymentButton.attr("data-id");
        
        var options = {
            "key": "rzp_test_WzhAnPK5Y2z8DU",
            "amount": (totalAmount * 100), // 2000 paise = INR 20
            "name": "Vertical Media",
            "description": "Payment",
            "image": "thumbnail_url",
            "handler": function(response) {
                $.ajax({
                    url: 'payment-proccess.php',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        razorpay_payment_id: response.razorpay_payment_id,
                        totalAmount: totalAmount,
                        product_id: product_id,
                        payment_status: 'paid',
                    },
                    success: function(msg) {
                        // Update the button text to "Paid" upon successful payment
                        paymentButton.text("Paid");
                        paymentButton.attr("disabled", "disabled"); // Optionally disable the button
                        paymentButton.removeClass("buy_now"); // Optionally remove the buy_now class
                        // Redirect to success page
                        // window.location.href = 'success.php';
                    }
                });
            },
            "theme": {
                "color": "#528FF0"
            }
        };

        var rzp1 = new Razorpay(options);
        rzp1.open();
        e.preventDefault();
    });
});
</script>


<br><br>
<a href="logout.php">Logout</a>
    <a href="profileupdate.php">profile</a>


</body>
</html>
