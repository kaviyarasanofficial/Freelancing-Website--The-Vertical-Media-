<?php 
session_start();

# Database Connection File
include "php/conn.php";

# Book helper function
include "php/bidfunc.php";
$proposalResults = get_all_bid($conn);


 ?>

<!DOCTYPE html>
<html>
<head>
  <title>DataTables Example</title>
  <meta http-equiv="refresh" content="">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.tailwindcss.com/v3.0.2/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="./style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  
<!-- <style>
.proposal-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px; /* Adjust the gap as needed */
}
.card {
    flex: 1;
    min-width: 300px; /* Adjust the min-width as needed */
    border: 1px solid #ccc;
    padding: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
</style> -->

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

<div class="container mt-5 proposal-container">
    <?php foreach ($proposalResults as $proposal): ?>
    <div class="card ">
        
            <div class="card-header ">
            Bedding ID: <?php echo $proposal['bid_id']; ?><br>  Project Date: <?php echo $proposal['projdate']; ?><br>
            </div>
            <div class="card-body ">

            
  <div class="row">
    <div class="col">
    <h5 class="card-title">Project Title : <?php echo $proposal['projtitle']; ?></h5>
                <p class="card-text">
                    
                   
                    
                    Seller Email: <?php echo $proposal['projselleremail']; ?><br>
                   <strong>Selling Budget: <?php echo $proposal['sellamount']; ?><br></strong> 
                   
                   <strong>Bid Amount: <?php echo $proposal['bidamount']; ?><br></strong> 
                    Within Deliver Days: <?php echo $proposal['deliverdayscount']; ?><br>
                    Country: <?php echo $proposal['country']; ?>
                   <p style="color:green;"> Status: <?php echo $proposal['status']; ?><br></p>
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
                    <a href="php/beddingdelete.php?proj_id=<?= urlencode($proposal['proj_id']) ?>" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" type="submit" name="decline" disabled>Delete</a>
                   
                </form>
    </div>
    <div class="col">
   <pre> Freelancer Name: <?php echo $proposal['freelancername']; ?>        Email:<?php echo $proposal['freelanceremail']; ?></pre><br>
   <p> Proposal Details:  <?php  echo $proposal['proposal']; ?></p>                    
    </div>
  
               
            </div>
        
    </div>
    <hr> <!-- Adding a horizontal line between proposals -->
    <?php endforeach; ?>
</div>

</body>
</html>
