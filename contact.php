
<?php
session_start();
include "php/conn.php";
include "dashfunc.php";
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
</head>
<body>
    <!-- tailwind css     -->
<script src="https://cdn.tailwindcss.com"></script>
<!-- font awesome -->
    
  <div class=" container mx-auto flex justify-center items-center lg:px-20 md:px-14 sm:px-8 bg-gray-200 py-12 h-full">
    <div class="grid lg:grid-cols-3 grid-col-1">
      
<div class="bg-red-500 px-9 py-14">
  <h1 class="text-3xl text-white font-medium">Lets Touch Me</h1>
  <p class="py-2 text-base text-gray-100">Lorem ipsum dolor sit amet, consectetur adipisicing elit tdit rrum?</p>
  <div class="location mt-7">
   <div class="flex my-4 items-center">
    <span class="border-2 border-solid border-b-gray-100 p-4 rounded-full w-10 h-10 flex mr-3 justify-center items-center"><i class="fa-solid fa-location-dot text-gray-200"></i></span>
    <Address class="text-gray-100">Address: 198 West 21th Street, Lahore, Pakistan</Address>
  </div>
  <div class="flex my-4 items-center">
    <span class="border-2 border-solid border-b-gray-100 p-4 rounded-full w-10 h-10 flex mr-3 justify-center items-center"><i class="fa-solid fa-phone text-gray-200"></i></span>
    <span class="text-gray-100">Phone: 92 314 4878266</span>
  </div>
  <div class="flex my-4 items-center">
    <span class="border-2 border-solid border-b-gray-100 p-4 rounded-full w-10 h-10 flex mr-3 justify-center items-center"><i class="fa-solid fa-envelope text-gray-200"></i></span>
    <span class="text-gray-100">Email: info@gmail.com</span>
  </div>
  <div class="flex my-4 items-center">
    <span class="border-2 border-solid border-b-gray-100 p-4 rounded-full w-10 h-10 flex mr-3 justify-center items-center"><i class="fa-brands fa-chrome text-gray-200"></i></span>
    <span class="text-gray-100">Website: yoursite.com</span>
  </div>
  </div>
</div>
<div class="bg-white col-span-2 py-14 lg:px-10 px-8">
  <h2 class="text-3xl font-medium">Get in touch</h2>
  <form action="php/contact.php" method="post" >
 <div class="grid md:grid-cols-2 grid-col-1 gap-4">
    <div class="flex flex-col py-4">
    <label for="First Name" class="text-base font-medium">First Name</label>
    <input type="text" name="name" class="outline-none border-b-2 border-solid focus:border-red-400 transition-all">
  </div>
   <div class="flex flex-col py-4">
    <label for="First Name" class="text-base font-medium">Subject</label>
    <input type="text"  name="subject" class="outline-none border-b-2 border-solid focus:border-red-400 transition-all">
  </div>
 </div>
   <div class="flex flex-col py-4">
    <label for="Email" class="text-base font-medium">Email</label>
    <input type="text" name="email" value="<?php echo $email; ?>" class="outline-none border-b-2 border-solid focus:border-red-400 transition-all" readonly>
  </div>
    <div class="flex flex-col py-4 pb-8">
    <label for="Message" class="text-base font-medium">Message</label>
    <textarea name="message"  id="" cols="20" rows="4" class="outline-none border-b-2 border-solid focus:border-red-400 transition-all"></textarea>
  </div>

  
  <input type="submit" class="bg-red-400 px-8 py-3 rounded-md text-white hover:bg-white hover:text-red-400 border-2 border-solid border-red-400 transition-all" value="Submit Now">
  <a href="index.php" class="bg-red-400 px-8 py-3 rounded-md text-white hover:bg-white hover:text-red-400 border-2 border-solid border-red-400 transition-all">Cancel</a>
</form>
</div>
</div>

    </div>
</body>
</html>



<?php
} else {
    // Redirect to login page if the user is not logged in
    header("Location: login.php");
    exit;
}
?>