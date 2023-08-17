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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile | suhasrkms</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="profile.css">
 </head>


 <body  style="min-height:90vh;">
    
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
                <a class="nav-link" href="dashboard.php">Dashboard <span class="sr-only">(current)</span></a>
              </li>

              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home </a>
              </li>

               <!-- <li class="nav-item dropdown  main-menu">
                  <a class="nav-link dropdown-toggle" href="#" >Find Freelancers</a>
                  <div class="dropdown-menu main-menubox" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="./freelancer.html">Top Freelancer</a>
                    <a class="dropdown-item" href="#">Our Lawyers – Claudia Roberts Ellmann</a>
                  </div>
                </li> -->
                 <!-- <li class="nav-item dropdown main-menu">
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
                  </li> -->
                  <li class="nav-item">
  <a class="nav-link" href="#"><?php echo $email; ?></a>
    </li>
              <li class="nav-item">
                <a href="postproject.php" class="btn btn-primary">Post a Project</a>
              </li>
            </ul>
          </div>
        </div>
</nav>
 
 
 <div id="app">
             <div class="row justify-content-center">
                <div class="col-lg-4">
                   <h4 class="pb-2">
                      Profile Information
                   </h4>
                   <span class="text-justify mb-3" style="padding-top:-3px;">Update your account's profile information and email address.<br><br> When You change your email ,you need to verify your email else the account will be blocked</span>
                </div>
                <div class="col-lg-8 text-center pt-2">
                   <div class="card py-4 mb-5 mt-md-3 bg-white rounded " style="box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175)">

                   <form class="login-form" action="profilereg.php" method="POST" enctype="multiple/form-data">
                          <div class="form-group px-3">

                            <label for="displayName" class="col-12 text-left pl-0">Screen Name</label>
                            <input type="text" class="col-md-8 form-control" name="name" placeholder="JaneDoe" required>

                            <label for="email" class="pt-3 col-12 text-left pl-0">Email</label>
                            <input type="email" class="col-md-8 form-control" name="email" value="<?php echo $email; ?>" placeholder="name@example.com" readonly>

                          </div>
                          <!-- <div class="form-group row mb-0 mr-4">
                              <div class="col-md-8 offset-md-4 text-right">
                                  <button type="submit" class="btn btn-primary">Save</button>
                               </div>
                          </div> -->
                          <!-- </form> -->

                   </div>
                </div>
             </div>
             
             <div class="border-bottom border-grey"></div>
             <div class="row justify-content-center pt-5">
                <div class="col-lg-4">
                   <h4 class="pb-2">
                   Update Password</h4>
                   <span class="text-justify" style="padding-top:-3px;">Ensure your account is using a long, random password to stay secure.</span>
                </div>
                <div class="col-lg-8 text-center pt-2">
                   <div class="card py-4 mb-5 mt-md-3 bg-white rounded" style="box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175)">

                   <!-- <form class="login-form" action="process_registration.php" method="POST" enctype="multiple/form-data"> -->
                          <div class="form-group px-3">

                            <label for="text" class="col-12 text-left pl-0">Country</label>
                            <input type="text" class="col-md-8 form-control" name="Country" placeholder="Country " required>

                            <label for="text" class="pt-3 col-12 text-left pl-0">Street</label>
                            <input type="text" class="col-md-8 form-control" name="Street" placeholder="Street" required>

                            <label for="text" class="pt-3 col-12 text-left pl-0">City</label>
                            <input type="text" class="col-md-8 form-control" name="City" placeholder="City" required>

                            <label for="text" class="pt-3 col-12 text-left pl-0">State</label>
                            <input type="text" class="col-md-8 form-control" name="State" placeholder="State" required>

                            <label for="text" class="pt-3 col-12 text-left pl-0">ZIP</label>
                            <input type="text" class="col-md-8 form-control" name="ZIP" placeholder="ZIP" required>

                          </div>
                          <div class="form-group row mb-0 mr-4">
                              <div class="col-md-8 offset-md-4 text-right">
                                  <button type="submit" class="btn btn-primary">Save</button>
                              </div>
                          </div>
                      </form>
                   </div>
                </div>
             </div>
             <div class="border-bottom border-grey"></div>
             <div class="row justify-content-center pt-5">
                <div class="col-lg-4">
                   <h4 class="pb-2">
                   Delete Account</h4>
                   <span class="text-justify" style="padding-top:-3px;">Permanently delete your account.</span>
                </div>
                <div class="col-lg-8 pt-0">
                   <div class="card py-4 mb-5 mt-md-3 bg-white rounded" style="box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175)">
                      <div class="text-left px-3">
                         Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.
                      </div>

                      <form>
                          <div class="form-group row mb-0 mr-4 pt-4 px-3">
                              <div class="col-md-8 offset-l-4 text-left">
                                  
                                  <a  class="btn btn-danger pl-3" href="deletemainacc.php">Contact Us</a>
                              </div>
                           </div>
                      </form>
                   </div>
                </div>
             </div>
          </div>
       </main>
    </div>
    <footer id="sticky-footer" class="flex-shrink-0 py-4 text-dark-50">
      
    </footer>
    <script>
      /*
We need to register the required plugins to do image manipulation and previewing.
*/
FilePond.registerPlugin(
	// encodes the file as base64 data
  FilePondPluginFileEncode,
	
	// validates files based on input type
  FilePondPluginFileValidateType,
	
	// corrects mobile image orientation
  FilePondPluginImageExifOrientation,
	
	// previews the image
  FilePondPluginImagePreview,
	
	// crops the image to a certain aspect ratio
  FilePondPluginImageCrop,
	
	// resizes the image to fit a certain size
  FilePondPluginImageResize,
	
	// applies crop and resize information on the client
  FilePondPluginImageTransform
);

// Select the file input and use create() to turn it into a pond
// in this example we pass properties along with the create method
// we could have also put these on the file input element itself
FilePond.create(
	document.querySelector('input'),
	{
		labelIdle: `Drag & Drop your picture or <span class="filepond--label-action">Browse</span>`,
    imagePreviewHeight: 170,
    imageCropAspectRatio: '1:1',
    imageResizeTargetWidth: 200,
    imageResizeTargetHeight: 200,
    stylePanelLayout: 'compact circle',
    styleLoadIndicatorPosition: 'center bottom',
    styleButtonRemoveItemPosition: 'center bottom'
	}
);
      </script>
 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
<?php
} else {
    // Redirect to login page if the user is not logged in
    header("Location: login.php");
    exit;
}
?>
