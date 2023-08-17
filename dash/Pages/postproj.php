<?php 
session_start();

# Database Connection File
include "php/conn.php";

# Book helper function
include "php/catfun.php";
$cat = get_all_cat($conn);


 ?>




<!DOCTYPE html>
<html>
<head>
  <title>Post a Project</title>
  <!-- Add Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="./style.css">
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<nav class="p-4 bg-gray-800 text-gray-200 mb-3">
  <div class="flex justify-between items-center">
  <div class="flex items-center pl-8">
    <i class="text-2xl fas fa-campground"></i>
    <img class="well" style="height: 50px; width: 150px;" src="https://verticalmedia.co.in/img/logo.png" >
  </div>
  
  <!-- MOBILE NAV ICON -->
  <div class="md:hidden block absolute top-4 right-8 fixed">
    <button aria-label="navigation" type="button"  class="md:hidden text-gray-200 transition duration-300 focus:outline-none focus:text-white hover:text-white"><i class="fas fa-bars text-3xl" id="bars"></i>            </button>
  </div>
  
  <!-- NAVIGATION - LARGE SCREENS -->
    <div class="hidden md:flex">
  <ul class="hidden md:flex">
    <li class="text-lg pr-8 "><a href="../admin.php" class="transition duration-300 focus:outline-none focus:text-yellow-500 focus:underline hover:underline hover:text-yellow-500" style="text-underline-offset: 8px;">Dashboard</a></li>
    <li class="text-lg pr-8"><a href="projectsmanage.php" class="transition duration-300 focus:outline-none focus:text-yellow-500 focus:underline hover:underline hover:text-yellow-500" style="text-underline-offset: 8px;">All Projects</a></li>
    <li class="text-lg pr-8"><a href="" class="transition duration-300 focus:outline-none focus:text-yellow-500 focus:underline hover:underline hover:text-yellow-500" style="text-underline-offset: 8px;">Message</a></li>
    <li class="text-lg pr-8"><a href="" class="transition duration-300 focus:outline-none focus:text-yellow-500 focus:underline hover:underline hover:text-yellow-500" style="text-underline-offset: 8px;">Contact</a></li>
  </ul>
  </div>

  
  </div>
    
  <!-- MOBILE MENU -->
    <div id="mobileMenu" class="hidden flex w-full mx-auto py-8 text-center">
        <div class="flex flex-col justify-center items-center w-full">
        <a href="#" class="block text-gray-200 cursor-pointer py-3 transition duration-300 focus:outline-none focus:text-yellow-500 focus:underline hover:underline hover:text-yellow-500" style="text-underline-offset: 8px;">Dashboard</a>
        <a href="#" class="block text-gray-200 cursor-pointer mt-1 py-3 transition duration-300 focus:outline-none focus:text-yellow-500 focus:underline hover:underline hover:text-yellow-500" style="text-underline-offset: 8px;">New Project</a>
        <a href="#" class="block text-gray-200 cursor-pointer mt-1 py-3 transition duration-300 focus:outline-none focus:text-yellow-500 focus:underline hover:underline hover:text-yellow-500" style="text-underline-offset: 8px;">Message</a>
          <a href="#" class="block text-gray-200 cursor-pointer mt-1 py-3 transition duration-300 focus:outline-none focus:text-yellow-500 focus:underline hover:underline hover:text-yellow-500" style="text-underline-offset: 8px;">Contact</a>
          </div>
      </div>
</nav>
  <div class="container" >
    <div class="row justify-content-center " style="margin-bottom:10px;">
      <div class="col-md-6">
      <form action="php/postproj.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="projectName">Project Name</label>
            <input type="text" class="form-control" id="projectName" name="Name"  required>
          </div>
          <div class="form-group">
            <label for="projectDescription">Project Description</label>
            <textarea class="form-control" id="projectDescription" rows="5"  name="Description"  required></textarea>
          </div>
          <div class="form-group">
            <label for="fileInput">Drag & drop any images or documents that might be helpful in explaining your brief here (Max file size: 25 MB)</label>
            <!-- <input type="file" class="form-control-file" id="fileInput" name="thumbnail" value="image" accept=".jpg, .jpeg, .png, .pdf" multiple> -->
            <input type="file" class="form-control-file" name="thumbnail" required>
          </div>
          <div class="form-group">
            <label for="requiredSkills">What skills are required?</label>
            <input type="text" class="form-control" id="requiredSkills"  name="skills"  required>
          </div>
          <!-- <div class="form-group">
            <label for="suggestedSkills">Suggested Skills</label>
            <input type="text" class="form-control" name="pay" value="pay" id="suggestedSkills">
          </div> -->
          <div class="form-group">
            <label for="paymentMethod">How do you want to pay?</label>
            <select class="form-control" name="paymethod"  id="paymethod">
              <option value="Rupee">Rupee</option>
              <option value="Dollers">Dollers</option>
            </select>
          </div>
          <div class="form-group">
            <label for="paymentMethod">Choose Project Catagorie</label>
            <select class="form-control" name="catagories"  id="catagories">
            <?php foreach ($cat as $cats): ?>
<option value="Choose Project catagories"><?= $cats['Catagorie_Name'] ?></option>
<?php endforeach; ?>
            </select>
          </div>
          
          <div class="form-group">
            <label for="estimatedBudget">What is your estimated budget?</label>
            <input type="number" class="form-control" id="estimatedBudget" name="budget"  required>
          </div>
          <!-- <button type="submit" class="btn btn-primary" name="submit" value="submit" >Submit</button> -->
          <input type="submit" class="btn btn-primary" name="submit" value="submit">
        </form>
      </div>
    </div>
  </div>


 
  

  <!-- Add Bootstrap JS (if needed) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
