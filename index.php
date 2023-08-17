<?php
session_start();
// ... your other code ...

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
    <title>Freelance Website</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.tailwindcss.com/v3.0.2/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="./style.css">
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

     

<div class="container-fluid">
    <div class="search-container ">
        <img src="./free.jpg" class="homeimg" alt="">
        
        <form class="search-form">
            <h1 class="texta">Find & Hire<br>
                Expert Freelancers</h1>
                <h5 class="textb">Work with the best freelance talent from around the world on our secure,
                    flexible and cost-effective platform.</h5>
          <input type="text" class="search-input mt-5" placeholder="What skill are you looking for?">
          <button type="submit" class="search-button">Search</button>
        </form>
      </div>
</div>
   
<div class="container-fluid bg-light p-40">
<div class="container">
<div class="row  ">
    <div class="col ">
        <h5><i class="bi bi-person-badge-fill"></i><strong>800,000</strong></h5>
        <h5>Employers Worldwide</h5>
        
        </div>
    <div class="col">
        <h5><i class="bi bi-bookmark-star"></i><strong>1 Million</strong></h5>
        <h5>Paid Invoices</h5>
        
        </div>
    <div class="col">
        <h5><i class="bi bi-credit-card"></i><strong>$250 Million</strong></h5>
        <h5>Paid to Freelancers</h5>
        
    </div>
    <div class="col">
        
        <h5><i class="bi bi-trophy"></i><strong>99%</strong></h5>
        <h5>Customer Satisfaction Rate</h5>
        
        </div>
  </div>
</div></div>


<div class="container mt-5">
    <h1>Need something done?</h1>
    <div class="row ">
      <div class="col-sm mt-5">
        <h3><i class="bi bi-clipboard-check"></i> Post a job</h3>
        <p>
          It’s free and easy to post a job.
          Simply fill in a title, description
          and budget and competitive bids come
          within minutes.
        </p>
      </div>
      <div class="col-sm mt-5">
        <h3><i class="bi bi-person-fill"></i> Choose freelancers</h3>
       <p>
        No job is too big or too small. 
        We've got freelancers for jobs 
        of any size or budget, across 1800+ skills.
         No job is too complex. We can get it done!
       </p>
      </div>
      <div class="col-sm mt-5">
        <h3><i class="bi bi-window"></i> Pay safely</h3>
       <p>
        Only pay for work when it has been completed 
        and you're 100% satisfied with the quality 
        using our milestone payment system.
       </p>
      </div>
    </div>
  </div>
<hr class="mt-6">
  <div class="container mt-5">
    <h1>What's great about it?</h1>
    <div class="row ">
      <div class="col-sm mt-5">
        <h3><i class="bi bi-receipt"></i>Browse portfolios</h3>
        <p>
          It’s free and easy to post a job.
          Simply fill in a title, description
          and budget and competitive bids come
          within minutes.
        </p>
      </div>
      <div class="col-sm mt-5">
       <h3><i class="bi bi-patch-check"></i> Fast bids</h3>
       <p>
        No job is too big or too small. 
        We've got freelancers for jobs 
        of any size or budget, across 1800+ skills.
         No job is too complex. We can get it done!
       </p>
      </div>
      <div class="col-sm mt-5">
       <h3><i class="bi bi-hand-thumbs-up"></i> Quality work</h3>
       <p>
        Only pay for work when it has been completed 
        and you're 100% satisfied with the quality 
        using our milestone payment system.
       </p>
      </div>
      <div class="col-sm mt-5">
        <h3><i class="bi bi-clipboard-check"></i>Track progress</h3>
        <p>
         Only pay for work when it has been completed 
         and you're 100% satisfied with the quality 
         using our milestone payment system.
        </p>
       </div>
    </div>
  </div>
  <hr>

  <div class="container mt-5" style="text-align: center;">
    <h1>Top Most Services</h1>
    <h5>Picked Top Serviced For You</h5>
    <hr style="color: red; height: 4px;">
    <p>Lorem ipsum dolor amet consectetur adipisicing eliteiuim sete eiusmod tempor incididunt ut<br> labore etnalom dolore magna aliqua udiminimate veniam quis norud</p>
  </div>
  

  <div class="container justify-content-center">
    <div class="row d-flex">
      <div class="col-md-4">
        <div class="card mt-4" style="width: 18rem;">
            <div class="card" style="width: 18rem;">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://amentotech.com/projects/elementor/wp-content/uploads/2019/06/19-352x200.jpg" alt="Card image cap">
                    <div class="card-body">
                      <p class="card-text"><h5>Sanvi Tambe</h5>
                        <p><strong>I Will Make Professional Excel And Google Sheets</strong></p>
                        <p>Starting from: <span style="color: red;"><strong>$20.00</strong></span></p>
                    </div>
                  </div>
            </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mt-4" style="width: 18rem;">
            <div class="card" style="width: 18rem;">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://amentotech.com/projects/elementor/wp-content/uploads/2019/06/04-352x200.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text"><h5>Sanvi Tambe</h5>
                            <p><strong>I Will Make Professional Excel And Google Sheets</strong></p>
                            <p>Starting from: <span style="color: red;"><strong>$20.00</strong></span></p>
                    </div>
                  </div>
            </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mt-4" style="width: 18rem;">
            <div class="card" style="width: 18rem;">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://amentotech.com/projects/elementor/wp-content/uploads/2019/06/04-352x200.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text"><h5>Sanvi Tambe</h5>
                            <p><strong>I Will Make Professional Excel And Google Sheets</strong></p>
                            <p>Starting from: <span style="color: red;"><strong>$20.00</strong></span></p>
                    </div>
                  </div>
            </div>
        </div>
      </div>
    </div>
  </div>


  <div class="container justify-content-center mt-5">
    <div class="row d-flex">
      <div class="col-md-4">
        <div class="card mt-4" style="width: 18rem;">
            <div class="card" style="width: 18rem;">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://amentotech.com/projects/elementor/wp-content/uploads/2019/06/andriod-352x200.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text"><h5>Sanvi Tambe</h5>
                            <p><strong>I Will Make Professional Excel And Google Sheets</strong></p>
                            <p>Starting from: <span style="color: red;"><strong>$20.00</strong></span></p>
                    </div>
                  </div>
            </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mt-4" style="width: 18rem;">
            <div class="card" style="width: 18rem;">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://amentotech.com/projects/elementor/wp-content/uploads/2019/06/andriod-352x200.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text"><h5>Sanvi Tambe</h5>
                            <p><strong>I Will Make Professional Excel And Google Sheets</strong></p>
                            <p>Starting from: <span style="color: red;"><strong>$20.00</strong></span></p>
                    </div>
                  </div>
            </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mt-4" style="width: 18rem;">
            <div class="card" style="width: 18rem;">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://amentotech.com/projects/elementor/wp-content/uploads/2019/06/05-352x200.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text"><h5>Sanvi Tambe</h5>
                            <p><strong>I Will Make Professional Excel And Google Sheets</strong></p>
                            <p>Starting from: <span style="color: red;"><strong>$20.00</strong></span></p>
                    </div>
                  </div>
            </div>
        </div>
      </div>
    </div>
  </div>

  <div class="mt-5 viewmore d-flex align-items-center justify-content-center">
    <button type="button" class="btn btn-primary">View All Services</button>
  </div><br>
  <hr>
  
<div class="container mt-5">
    <h1>Get work done in over 1800 different categories</h1>
    <table class="table mt-5 .table-borderless">
        
        <tbody>
          <tr>
            
            <td>Website Design</td>
            <td>Mobile Apps</td>
            <td>Android Apps</td>
            <td>iPhone Apps</td>
          </tr>
          <tr>
            
            <td>Software Architecture</td>
            <td>Graphic Design</td>
            <td>Logo Design</td>
            <td>Public Relations</td>
          </tr>
          <tr>
            
            <td>Logistics</td>
            <td>Proofreading</td>
            <td>Translation</td>
            <td>Research</td>
          </tr>
          <tr>
            
            <td>Research Writing</td>
            <td>Article Writing</td>
            <td>Web Scraping</td>
            <td>HTML</td>
          </tr>
          <tr>
            
            <td>CSS</td>
            <td>HTML 5</td>
            <td>Javascript</td>
            <td>Data Processing</td>
          </tr>
          <tr>
            
            <td>Python</td>
            <td>Wordpress</td>
            <td>Web Search</td>
            <td>Finance</td>
          </tr>
          <tr>
            
            <td>Legal</td>
            <td>Linux</td>
            <td>Manufacturing</td>
            <td>Amazon Web Services</td>
          </tr>
          <tr>
            
            <td>Content Writing</td>
            <td>Marketing</td>
            <td>Excel</td>
            <td>Ghostwriting</td>
          </tr>
          <tr>
            
            <td>Copywriting</td>
            <td>Accounting</td>
            <td>MySQL</td>
            <td>Banner Design</td>
          </tr>
          
          <td>Illustration</td>
          <td>Software Development</td>
          <td>PHP</td>
          <td>3D Modelling</td>
        </tr>
        
        
        <td>Photoshop</td>
        <td>Technical Writing</td>
        <td>Blogging</td>
        <td>Internet Marketing</td>
      </tr>
      
      
      <td>eCommerce</td>
      <td>Data Entry</td>
      <td>Link Building</td>
      <td>C++ Programming</td>
    </tr>
    
    
        </tbody>
      </table>
</div>
  <div class="container">
  <h2>Frequently Asked Questions</h2>
<details>
  <summary class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400">Epcot Center</summary>
  <p class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">Epcot is a theme park at Walt Disney World Resort featuring exciting attractions, international pavilions, award-winning fireworks and seasonal special events.</p>
</details>

<details>
  <summary>Epcot Center</summary>
  <p>Epcot is a theme park at Walt Disney World Resort featuring exciting attractions, international pavilions, award-winning fireworks and seasonal special events.</p>
</details>

<details>
  <summary>Epcot Center</summary>
  <p>Epcot is a theme park at Walt Disney World Resort featuring exciting attractions, international pavilions, award-winning fireworks and seasonal special events.</p>
</details>

<details>
  <summary>Epcot Center</summary>
  <p>Epcot is a theme park at Walt Disney World Resort featuring exciting attractions, international pavilions, award-winning fireworks and seasonal special events.</p>
</details>
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
                        <a class="nav-link" href="dash/index.php">Admin</a>
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
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Our services</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

      
  </div>



</body>
</html>