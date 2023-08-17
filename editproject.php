<?php
       
       session_start();

# Database Connection File
include "php/conn.php";
include "dashfunc.php";

// include "php/projfunc.php";
//     $proj = get_proj($conn, $id);

$id = $_GET['id'];; // Replace with the actual value of the ID you want to retrieve

// ...

include "php/projfunc.php";
$proj = null; // Initialize the $proj variable

if (!empty($id)) {
    $proj = get_proj($conn, $id); // Call the function only if $id is not empty
}



# Book helper function
include "admin/pages/php/catfun.php";
$cat = get_all_cat($conn);
       
       
       // Get the current date
        $currentDate = date('Y-m-d');

        if (isset($_SESSION['dashboard_id']) && isset($_SESSION['user_email'])) {
          // Retrieve the user's email and ID from the session
          $user_email = $_SESSION['user_email'];
          
      
          // Prepare the SQL query using a prepared statement
          
      
          // Sanitize the input to prevent SQL injection
         
          $user_email = mysqli_real_escape_string($conn, $user_email);
      
          // Prepare the SQL query using a prepared statement
          $sql = "SELECT * FROM users WHERE Email = ?";
          $stmt = $conn->prepare($sql);
      
        
      
      
      
      } else {
          // Redirect to login page if the user is not logged in
          header("Location: login.php");
          exit;
      }
      ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
  .time{
    display:none;
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
                <a class="nav-link" href="dashboard.php">Dashboard <span class="sr-only"></span></a>
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
              <!-- <li class="nav-item">
                <a href="postproject.php" class="btn btn-primary">Post a Project</a>
              </li> -->
            </ul>
          </div>
        </div>
</nav>    <!-- component -->
<section class="max-w-4xl p-6 mx-auto bg-indigo-600 rounded-md shadow-md dark:bg-gray-800 mt-20">
    <h1 class="text-xl font-bold text-white capitalize dark:text-white">Edit Project</h1>
    <form action="php/updateproj.php" method="POST" enctype="multipart/form-data">
        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
       
            <div>
                <label class="text-white dark:text-gray-200" for="ProjectName">Project Name</label>
                <input id="Name" value="<?php echo isset($proj['Name']) ? $proj['Name'] : ''; ?>"  name="Name" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" autocomplete="off">
            </div>

            <div>
                <label class="text-white dark:text-gray-200" for="emailAddress">What skills are required?</label>
                <input value="<?php echo isset($proj['skills']) ? $proj['skills'] : ''; ?>" id="emailAddress" type="text" name="skills" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" autocomplete="off">
            </div>

            <div>
                <label class="text-white dark:text-gray-200" for="passwordConfirmation">How do you want to pay?</label>
                <select value="<?php echo isset($proj['payment_method']) ? $proj['payment_method'] : ''; ?>" name="paymethod" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                <option value="Rupee">Rupee</option>
              <option value="Dollers">Dollers</option>
                </select>
            </div>

            <div>
                <label class="text-white dark:text-gray-200" for="passwordConfirmation">What is your estimated budget?</label>
                <input value="<?php echo isset($proj['budget']) ? $proj['budget'] : ''; ?>" type="number" id="passwordConfirmation" name="budget" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" autocomplete="off">
            </div>
            <!-- <div>
                <label class="text-white dark:text-gray-200" for="passwordConfirmation">Color</label>
                <input id="color" type="color" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div> -->
            <div>
                <label class="text-white dark:text-gray-200" for="passwordConfirmation">Choose Project Catagorie</label>
                <select value="<?php echo isset($proj['catagories']) ? $proj['catagories'] : ''; ?>" name="catagories" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                <?php foreach ($cat as $cats): ?>
<option value="<?= $cats['Catagorie_Name'] ?>"><?= $cats['Catagorie_Name'] ?></option>
<?php endforeach; ?>
                </select>
            </div>
            <!-- <div>
                <label class="text-white dark:text-gray-200" for="passwordConfirmation">Range</label>
                <input id="range" type="range" class="block w-full py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div> -->
            <div class="time">
                <label class="text-white dark:text-gray-200 " for="Date">Date</label>
                <input value="<?php echo $currentDate; ?>" id="date" name="date"  class="  block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" readonly>
            </div>

            <div>
                <label class="text-white dark:text-gray-200" for="username">Email</label>
                <input  id="email" name="email" type="text" value="<?php echo $email; ?>" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring " readonly>
            </div>
       

            <div>
                <label class="text-white dark:text-gray-200" for="passwordConfirmation">Project Description</label>
                <textarea id="textarea" name="Description" rows="5" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" autocomplete="off"><?php echo isset($proj['Description']) ? $proj['Description'] : ''; ?></textarea>
</div>
            <div>
                <label class="block text-sm font-medium text-white">
                Thumbnail Image
              </label>
              <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                <div class="space-y-1 text-center">
                  <svg class="mx-auto h-12 w-12 text-white" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  <div class="flex text-sm text-gray-600">
                    <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                      <span class="">Upload a file</span>
                      <input id="file-upload" value="<?php echo isset($proj['thumbnail_url']) ? $proj['thumbnail_url'] : ''; ?>" name="thumbnail" name="file-upload" type="file" class="sr-only">
                    </label>
                    <p class="pl-1 text-white">or drag and drop</p>
                  </div>
                  <p class="text-xs text-white">
                    PNG, JPG, GIF up to 10MB
                  </p>
                </div>
              </div>
            </div>
        </div>

        <div class="flex justify-end mt-6">
            <button name="submit" value="submit" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-pink-500 rounded-md hover:bg-pink-700 focus:outline-none focus:bg-gray-600">Save</button>
            <a href="index.php" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-pink-500 rounded-md hover:bg-pink-700 focus:outline-none focus:bg-gray-600"> Home</a>
        
        </div>
        <div><input class="time" name="proj_id" value="<?php echo $proj['id']; ?>"></div>



        
    </form class="mb-5">
</section>

 <!-- <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800 mt-20">
    <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Account settings</h2>
    
    <form>
        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="username">Username</label>
                <input id="username" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>

            <div>
                <label class="text-gray-700 dark:text-gray-200" for="emailAddress">Email Address</label>
                <input id="emailAddress" type="email" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>

            <div>
                <label class="text-gray-700 dark:text-gray-200" for="password">Password</label>
                <input id="password" type="password" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>

            <div>
                <label class="text-gray-700 dark:text-gray-200" for="passwordConfirmation">Password Confirmation</label>
                <input id="passwordConfirmation" type="password" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>
        </div>

        <div class="flex justify-end mt-6">
            <button class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
        </div>
    </form>
</section> -->
</body>
</html>