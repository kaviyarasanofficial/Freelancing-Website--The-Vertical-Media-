<?php 
session_start();

# Database Connection File
include "php/conn.php";

# Book helper function
include "php/projfunc.php";
$proj = get_all_proj($conn);


 ?>

<!DOCTYPE html>
<html>
<head>
  <title>DataTables Example</title>
  <meta http-equiv="refresh" content="">
  
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
  <!-- Add DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/jquery.dataTables.min.css">
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  
  <style>
    
    </style>
</head>
<body >

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
    <li class="text-lg pr-8 "><a href="../Projects.php" class="transition duration-300 focus:outline-none focus:text-yellow-500 focus:underline hover:underline hover:text-yellow-500" style="text-underline-offset: 8px;">Dashboard</a></li>
    <li class="text-lg pr-8"><a href="../../postproject.php" class="transition duration-300 focus:outline-none focus:text-yellow-500 focus:underline hover:underline hover:text-yellow-500" style="text-underline-offset: 8px;">New Project</a></li>
    <li class="text-lg pr-8"><a href="" class="transition duration-300 focus:outline-none focus:text-yellow-500 focus:underline hover:underline hover:text-yellow-500" style="text-underline-offset: 8px;">Message</a></li>
    <li class="text-lg pr-8"><a href="postproject.php" class="transition duration-300 focus:outline-none focus:text-yellow-500 focus:underline hover:underline hover:text-yellow-500" style="text-underline-offset: 8px;">Contact</a></li>
  </ul>
  </div>

  
  </div>
    
  <!-- MOBILE MENU -->
    <div id="mobileMenu" class="hidden flex w-full mx-auto py-8 text-center">
        <div class="flex flex-col justify-center items-center w-full">
        <a href="../Projects.php" class="block text-gray-200 cursor-pointer py-3 transition duration-300 focus:outline-none focus:text-yellow-500 focus:underline hover:underline hover:text-yellow-500" style="text-underline-offset: 8px;">Dashboard</a>
        <a href="#" class="block text-gray-200 cursor-pointer mt-1 py-3 transition duration-300 focus:outline-none focus:text-yellow-500 focus:underline hover:underline hover:text-yellow-500" style="text-underline-offset: 8px;">New Project</a>
        <a href="#" class="block text-gray-200 cursor-pointer mt-1 py-3 transition duration-300 focus:outline-none focus:text-yellow-500 focus:underline hover:underline hover:text-yellow-500" style="text-underline-offset: 8px;">Message</a>
          <a href="#" class="block text-gray-200 cursor-pointer mt-1 py-3 transition duration-300 focus:outline-none focus:text-yellow-500 focus:underline hover:underline hover:text-yellow-500" style="text-underline-offset: 8px;">Contact</a>
          </div>
      </div>
</nav>



    
            <table id="example" class="display">
                <thead>
                    <tr>
                        <th style="visible:hidden;">No</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>skills</th>
                        <th>budget</th>
                        <th>thumbnail_url</th>
                        <th>payment_method</th>
                        <th>catagories</th>
                        <th>Actions</th>
                        <!-- Add more header columns if needed -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($proj as $projs): ?>
                        <tr>
                            <td><?= $projs['id'] ?></td>
                            <td><?= $projs['Name'] ?></td>
                            <td><?= $projs['Description'] ?></td>
                            <td><?= $projs['skills'] ?></td>
                            <td><?= $projs['budget'] ?></td>
                            <td><?= $projs['thumbnail_url'] ?></td>
                            <td><?= $projs['payment_method'] ?></td>
                            <td><?= $projs['catagories'] ?></td>
                            <td><a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" href="php/delete.php?id=<?= urlencode($projs['id']) ?>" onclick="return confirm('Are you sure you want to delete this project?')">Delete</a>
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

</body>
</html>
