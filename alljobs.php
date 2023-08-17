<?php 
session_start();

# Database Connection File
include "php/conn.php";

# Book helper function
include "php/projfunc.php";
$proj = get_all_proj($conn);


if (isset($_SESSION['user_email'])) {
      $_SESSION['user_email'];
} else {
    
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="5">
    <title>Freelance Website</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="./style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style>
    img{
  height:200px;
  width:259px;
}

.item{
  padding-left:9px;
  padding-right:5px;
}
.item-card{
  transition:0.5s;
  cursor:pointer;
}
.item-card-title{  
  font-size:15px;
  transition:1s;
  cursor:pointer;
}
.item-card-title i{  
  font-size:15px;
  transition:1s;
  cursor:pointer;
  color:#ffa710
}
.card-title i:hover{
  transform: scale(1.25) rotate(100deg); 
  color:#18d4ca;
  
}
.card:hover{
  transform: scale(1.05);
  box-shadow: 10px 10px 15px rgba(0,0,0,0.3);
}
.card-text{
  height:80px;  
}

.card::before, .card::after {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  transform: scale3d(0, 0, 1);
  transition: transform .3s ease-out 0s;
  background: rgba(255, 255, 255, 0.1);
  content: '';
  pointer-events: none;
}
.card::before {
  transform-origin: left top;
}
.card::after {
  transform-origin: right bottom;
}
.card:hover::before, .card:hover::after, .card:focus::before, .card:focus::after {
  transform: scale3d(1, 1, 1);
}

.jobscard1{
    margin-top: 120px;
    
}

    
   
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">


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
     
      
          
<div class="container jobscard1">
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
                    <!-- Wrap the card content with an anchor tag -->
                    <a href="betproject.php?id=<?= $projs['id'] ?>">
                        <img src="php/thumbnails/<?= $thumbnail_url ?>" alt="Photo of sunset">
                        <h5 class="item-card-title mt-3 mb-3">
                        <p class="card-text">
                        <?= $projs['Name'] ?>
                            <?= $projs['catagories'] ?><br>
                            <?= $projs['budget'] ?>
                        </p>
                    </a>
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
    </div>
</div>





<footer>
            <div class="footer-top mt-5">
                <div class="container">
                    <div class="footer-day-time">
                        <div class="row">
                            <div class="col-md-8">
                                <ul>
                                    <li>Opening Hours: Mon - Friday: 8AM - 5PM</li>
                                    <li>Sunday: 8:00 AM - 12:00 PM</li>
                                </ul>
                            </div>
                            <div class="col-lg-4">
                                <div class="phone-no">
                                    <a href="tel:+12 34 56 78 90"><i class="fa fa-mobile" aria-hidden="true"></i>Call +12 34 56 78 90</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            
                            <h4>About us</h4>
                            <p>Lorem Ipsum ist einfach Dummy-Text der Druck- und Satzindustrie. Lorem Ipsum war der Standard der Branche Lorem Ipsum ist einfach Dummy-Text der Druck- und Satzindustrie. Lorem Ipsum war der Standard der Branche  </p>
        
                        </div>
        
                        <div class="col-md-4">
                            <h4>Information</h4>
                            <ul class="address1">
                                <li><i class="fa fa-map-marker"></i>Lorem Ipsum 132 xyz Lorem Ipsum</li>
                                <li><i class="fa fa-envelope"></i><a href="mailto:#">info@test.com</a></li>
                                <li><i class="fa fa-mobile" aria-hidden="true"></i> <a href="tel:12 34 56 78 90">12 34 56 78 90</a></li>
                            </ul>
                        </div>
        
                        <div class="col-md-4">
                            <h4>Follow us</h4>
                            <ul class="social-icon">
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
        
                    </div>
                </div>
            </div>
            <div class="footer-bottom ">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-5">
                            <p class="copyright text-uppercase">Copyright © 2018
                            </p>
                        </div>
                        <div class="col-sm-7">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Our services</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
</footer>
        
</body>
</html>