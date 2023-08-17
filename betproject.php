<?php
# Database Connection File
include "php/conn.php";

// include "php/bitproj.php";
session_start();


// ... your other code ...

if (isset($_SESSION['user_email'])) {
      $_SESSION['user_email'];
} else {
    
}

// Check if the project ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch project details from the database based on the id
    // Replace this with your actual database query code
    $query = "SELECT * FROM newproj WHERE id = $id";
    // Execute the query and fetch the result
    $result = mysqli_query($conn, $query);
    
    // Check if the query was successful and if there's a project with the provided id
    if ($result && mysqli_num_rows($result) > 0) {
        $proj = mysqli_fetch_assoc($result);
        
        // Fetch more details using the email obtained from the fetched project
        $email = $proj['email'];
        $emailQuery = "SELECT * FROM users WHERE email = '$email'";
        $emailResult = mysqli_query($conn, $emailQuery);
        
        if ($emailResult && mysqli_num_rows($emailResult) > 0) {
            $emailDetails = mysqli_fetch_assoc($emailResult);
        }
    } else {
        // Handle the case when the project with the provided id doesn't exist
        echo "Project not found.";
    }
} else {
    // Handle the case when id is not provided in the URL
    echo "Project ID is missing.";
}

include "betfunc.php";




?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project</title>
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
    .container1 {
        margin-top:130px;
    }

    
    /* Add CSS rules here */
    .proposal-count {
        text-align: center;
        margin-top: 20px;
        font-weight: bold;
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
                <li class="nav-item dropdown main-menu">
                    <a class="nav-link dropdown-toggle" href="#">Find Freelancers</a>
                    <div class="dropdown-menu main-menubox" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="./freelancer.php">Top Freelancer</a>
                        <a class="dropdown-item" href="#">Our Lawyers – Claudia Roberts Ellmann</a>
                    </div>
                </li>
                <li class="nav-item dropdown main-menu">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Find Jobs
                    </a>
                    <ul class="dropdown-menu main-menubox" aria-labelledby="navbarDropdownMenuLink">
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" data-toggle="dropdown" href="./alljobs.html">Software Jobs</a>
                            <ul class="dropdown-menu left77">
                                <a class="dropdown-item" href="alljobs.php">IT Projects</a>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="#">Employment Management – Employers</a></li>       
                        <li><a class="dropdown-item" href="#">Employment Management – Employers</a></li>
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" data-toggle="dropdown" href="#">Initial Consultation</a>
                            <ul class="dropdown-menu left131">
                                <a class="dropdown-item" href="#">Initial Bankruptcy Consultation- Requested Documents</a>
                            </ul>
                        </li>
                    </ul>
                </li>
                <?php if (isset($_SESSION['user_email'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="#"><?= $_SESSION['user_email'] ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="./login.php">Sign Up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./login.php">Login</a>
                </li>
                <?php endif; ?>
                <?php if (isset($_SESSION['user_email'])): ?>
    <li class="nav-item">
        <a href="dashboard.php" class="btn btn-primary">Dashboard</a>
    </li>
      <?php else: ?>
    <li class="nav-item">
        <a href="postproject.php" class="btn btn-primary">Post a Project</a>
    </li>
    <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
        <div class="row ">
                <div class="col-9">
     


            <main role="main" class="container1 ">

    
<?php 

$current_freelancer_email = $_SESSION['user_email'];

// Fetch status from the database based on project ID and current freelancer's email
$statusQuery = "SELECT status FROM betproject WHERE proj_id = $id AND freelanceremail = '$current_freelancer_email'";
$statusResult = mysqli_query($conn, $statusQuery);

if ($statusResult && mysqli_num_rows($statusResult) > 0) {
    $statusRow = mysqli_fetch_assoc($statusResult);
    $status = $statusRow["status"];

    // Display the status message based on the fetched status value
    if ($status === 'Approved') {
        echo '<div class="alert alert-success" role="alert">';
        echo "Congratulation Status Approved Seller Contact To You Soon";
        echo '</div>';
    } elseif ($status === 'Declined') {
        echo '<div class="alert alert-danger" role="alert">';
        echo "Status: Declined Try Best Project";
        echo '</div>';
    } else {
        echo '<div class="alert alert-warning" role="alert">';
        echo "Status: Pending ";
        echo '</div>';
    }
} else {
    // echo "No data found for project ID $id.";
}



?>


            <?php if (isset($proj)): ?>
            <h2><?= $proj['Name'] ?></h2>
            
            

<!-- Display other project details as needed -->


            <div class="row">
            <div class="col-md">
            <div class="starter-template">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
        </li>
            <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
            </li>
            </ul>

        <!-- tab content starts here -->
            <div class="tab-content" id="myTabContent">
            
            <p><?= $proj['budget'] ?></p>
        <!-- content 1 -->
<div class="tab-pane masonry-container fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
<h5><strong>Project Details</strong></h5>
<br><p><?= $proj['Description'] ?></p> 
<div class="proposal-count ">
        <p>Number of Proposals: <?= $result->num_rows ?></p>
    </div>

<strong><p>
Skills Required</p></strong>

<span class="bg-indigo-100 text-indigo-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300"><?= $proj['skills'] ?></span>

<br><br><br>
<div class="bg-white p-6 rounded-lg shadow-lg">
<h2 class="text-2xl font-bold mb-2 text-gray-800">Beware of scams</h2>
<p class="text-gray-700">
If you are being asked to pay a security deposit, or if you are being asked to chat on Telegram, WhatsApp, or another messaging platform,
it is likely a scam. Report these projects or contact Support for assistance.</p>
</div>
</div>

<br><br>
<br>
<br>
<?php endif; ?>
<div class="max-w-screen-md  ">
<div class="text-center mb-16">

<h3 class="text-3xl sm:text-4xl leading-normal font-extrabold tracking-tight text-gray-900">
Place a Bid on this Project<span class="text-indigo-600">Touch</span>
</h3>
</div>
<p>You will be able to edit your bid until the project is awarded to someone.</p>


<form action="php/bitproj.php" method="POST" enctype="multipart/form-data">

<div class="flex flex-wrap -mx-3 mb-6">
<div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
Bid Amount
</label>
<input name="bitamount" class="appearance-none block w-full  text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="number" >

</div>
<div class="w-full md:w-1/2 px-3">
<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
This project will be delivered in
</label>
<input name="deliverydays" class="appearance-none block w-full  text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="number">
</div>
</div>


<div class="flex flex-wrap -mx-3 mb-6">
<div class="w-full px-3">
<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
Describe your proposal (minimum 100 characters)
</label>
<textarea name="proposal" rows="10" class="appearance-none block w-full  text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">

</textarea>
</div>
<div class="flex justify-between w-full px-3">
<div class="md:flex md:items-center">
<input type="hidden" name="id" value="<?= $proj['id'] ?>">
</div>
<button class="shadow bg-indigo-600 hover:bg-indigo-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-6 rounded" type="submit">
Place Bid
</button>
</div>

</div>

</form>
</div></div>



<!-- content 2 -->
<div class="tab-pane fade masonry-container" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    
</div>


<!-- content 3 -->
<div class="tab-pane fade masonry-container" id="contact" role="tabpanel" aria-labelledby="contact-tab">
</div>

</main></div>
    <div class="col-3 container1">
    <?php if (isset($emailDetails)): ?>
<a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">About the Client</h5>
    <p><?= $emailDetails['Country'] ?></p>
    <p>Project since: <?= $emailDetails['date'] ?></p>
    <p>Contact:  <?= $emailDetails['email'] ?></p>
    <!-- <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p> -->
</a>
<a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
    <p class="mb-2  font-bold tracking-tight text-gray-900 dark:text-white">How to write a winning bid</p>
    <pre>
Your best chance of winning this
project is writing a great bid
proposal here!

Great bids are ones that:
Are engaging and well written
without spelling or grammatical
errors

Show a clear understanding of
what is required for this
specific project - personalize
your response!

Explain how your skills &
experience relate to the project
and your approach to working
on it

Ask questions to clarify any
unclear details

Most of all - don't spam or post
cut-and-paste bids. You will be
penalized or banned if you do so.
    </pre>

</a>
    <?php endif; ?>

    <?php
if (isset($proposalData) && is_array($proposalData)) {
    foreach ($proposalData as $proposal) {
        echo "Name : " . $proposal['freelancername'] . "<br>";
        echo "Country: " . $proposal['country'] . "<br>";
        // echo "Status: " . $proposal['status'] . "<br>";
        echo "<hr>"; 
}
} else {
    echo "No proposals found for this project.";
}
?>
 </div>
   </div>
</body>
</html>