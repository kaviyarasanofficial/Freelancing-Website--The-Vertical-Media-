<?php 
session_start();

# Database Connection File
include "php/conn.php";

# Book helper function
include "php/catfun.php";
$cat = get_all_cat($conn);


 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/jquery.dataTables.min.css">
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
    <li class="text-lg pr-8 "><a href="../Website.php" class="transition duration-300 focus:outline-none focus:text-yellow-500 focus:underline hover:underline hover:text-yellow-500" style="text-underline-offset: 8px;">Dashboard</a></li>
    <li class="text-lg pr-8"><a href="../../postproj.php" class="transition duration-300 focus:outline-none focus:text-yellow-500 focus:underline hover:underline hover:text-yellow-500" style="text-underline-offset: 8px;">New Project</a></li>
    <li class="text-lg pr-8"><a href="" class="transition duration-300 focus:outline-none focus:text-yellow-500 focus:underline hover:underline hover:text-yellow-500" style="text-underline-offset: 8px;">Message</a></li>
    <li class="text-lg pr-8"><a href="postproj.php" class="transition duration-300 focus:outline-none focus:text-yellow-500 focus:underline hover:underline hover:text-yellow-500" style="text-underline-offset: 8px;">Contact</a></li>
  </ul>
  </div>

  
  </div>
    
  <!-- MOBILE MENU -->
    <div id="mobileMenu" class="hidden flex w-full mx-auto py-8 text-center">
        <div class="flex flex-col justify-center items-center w-full">
        <a href="../Website.php" class="block text-gray-200 cursor-pointer py-3 transition duration-300 focus:outline-none focus:text-yellow-500 focus:underline hover:underline hover:text-yellow-500" style="text-underline-offset: 8px;">Dashboard</a>
        <a href="../../postproj.php" class="block text-gray-200 cursor-pointer mt-1 py-3 transition duration-300 focus:outline-none focus:text-yellow-500 focus:underline hover:underline hover:text-yellow-500" style="text-underline-offset: 8px;">New Project</a>
        <a href="#" class="block text-gray-200 cursor-pointer mt-1 py-3 transition duration-300 focus:outline-none focus:text-yellow-500 focus:underline hover:underline hover:text-yellow-500" style="text-underline-offset: 8px;">Message</a>
          <a href="#" class="block text-gray-200 cursor-pointer mt-1 py-3 transition duration-300 focus:outline-none focus:text-yellow-500 focus:underline hover:underline hover:text-yellow-500" style="text-underline-offset: 8px;">Contact</a>
          </div>
      </div>
</nav>





<div class="container p-20  ">
    
<form action="php/addcat.php" method="POST" enctype="multipart/form-data">
  <div class="mb-6">
    <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter New Catagorie</label>
    <input type="text" name="Category_name" id="Category_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required>
    <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
  </div>
  
  <table id="example" class="display">
                <thead>
                    <tr>
                    <th style="visible:hidden;">No</th>
                        <th>catagories</th>
                        <th>Actions</th>
                        <!-- Add more header columns if needed -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cat as $cats): ?>
                        <tr>
                           
                        <td><?= $cats['id'] ?></td>
                            <td><?= $cats['Catagorie_Name'] ?></td>
                            <td><a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" href="php/deletecat.php?id=<?= urlencode($cats['id']) ?>" onclick="return confirm('Are you sure you want to delete this Catagorie_Name?')">Delete</a>
                            </td>
          
          
                            <!-- Add more data columns if needed -->
                        </tr>
                    <?php endforeach; ?>
                </tbody>
  </table>
          

<!-- Add jQuery and DataTables JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>

<script>
  // Initialize DataTable
  $(document).ready(function() {
    $('#example').DataTable();
  });
</script>
  
</form>

</div>

</body>
</html>