
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Omar Faruk">
    <meta name="description" content="">
    <meta name="keywords" content="LMS, Classnote, Mentors helpline">
    <title>Mentors Guide</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> 
    <!-- icon fonts -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <!-- custom css -->
    <style>
      #login-wrapper{
  width: 100%;
  height: 100vh;
  /*background-color: #00418A;*/
  /*background-color: #00000059;*/
  display: flex;
  align-items: center;
  justify-content: center;
  background-image: url(https://learnwithomar.org/img/3.jpg);
  background-position: center;
  background-repeat: no-repeat;
  background-attachment: scroll;
  background-size: cover;
    /*background-blend-mode: soft-light;*/

}
.opacity{
  position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background: linear-gradient(180deg,rgb(0 0 0 / 68%),rgba(0,0,0,.4),rgb(0 0 0 / 69%));
}
.login-left {
/*  background: linear-gradient(-45deg, #1D1CE5, #0008C1, #021d7b, #153462);*/
  background: linear-gradient(-45deg, #1D1CE5, #0008C1, #2b55e9, #153462);
  background-size: 400% 400%;
  animation: gradient 15s ease infinite;
  height: 500px;
    display: flex;
    align-items: center;
    padding: 58px;
}
.login-right{
  background-color: white;
  height: 500px;
    display: flex;
    align-items: center;
    padding: 58px;
    /*border-radius: 8px;*/
}
@keyframes gradient {
  0% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 0% 50%;
  }
}


.login-left h2{
  color: white;
  margin-bottom: 32px;
  font-size: 32px;
}
.login-left p,
.login-left p a{
  color: white;
}

.login-right h2{
  font-size: 32px;
  color: black;
}
.login-right p{
  margin-bottom: 32px;
}
.login-right input{
  padding: 14px 12px;
    margin-bottom: 18px;
    border-color: #000;
    border-radius: 4px;
    font-size: 14px;
    width: 100%;
}
.login-btn{
  width: 100%;
    background: #010ac2;
    border: 1px solid #010ac2;
    color: white;
    font-size: 16px;
}
.form-group{
  position: relative;
}
.login-form label{
  position: absolute;
    top: -12px;
    background: white;
    left: 12px;
    color: #000;
}
.login-form input:focus .login-form label{
  color: #010ac2 !important;
}
.login-form input:focus{
  border-color: #010ac2;
  outline: none;
  box-shadow: none;
}
.login-form input:focus::placeholder{
  color: #010ac2 !important;
}
.line{
  width: 140px;
    height: 4px;
    background: white;
    margin-top: 36px;
}
.lin{
  position: absolute;
    z-index: 9999;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
.login-wrapper .container{
  overflow: hidden;
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
              <a class="nav-link" href="index.php">Home</a>
            </li>
             <!-- <li class="nav-item dropdown  main-menu">
                <a class="nav-link dropdown-toggle" href="#" >Find Freelancers</a>
                <div class="dropdown-menu main-menubox" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Our Lawyers – Douglas S. Ellmann, Esq.</a>
                  <a class="dropdown-item" href="#">Our Lawyers – Claudia Roberts Ellmann</a>
                </div>
              </li>
               <li class="nav-item dropdown main-menu">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Find Jobs
                  </a>
                  <ul class="dropdown-menu main-menubox" aria-labelledby="navbarDropdownMenuLink">
                    <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" data-toggle="dropdown" href="#">Bankruptcy/Debtor and Creditor Rights</a>
                      <ul class="dropdown-menu left77">
                        <a class="dropdown-item" href="#">Common Bankruptcy Terms</a>
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
              <a class="nav-link" href="./login.html">Sign Up</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./login.html">Login</a>
            </li>
            <li class="nav-item">
              <a href="./postprj.html" class="btn btn-primary">Post a Project</a>
            </li> -->
          </ul>
        </div>
      </div>
    </nav>
    <!-- banner section code start -->
    <section id="login-wrapper">
      <div class="opacity"></div>
      <!-- login start -->
      <div class="container lin " style="z-index: 9999;">
        
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <div class="row login-main">
              <div class="col-md-6 p-0">
                <div class="login-left">
                  <a href=""><img src=""></a>
                  <div>
                    <h2>Please Sign in to continue!</h2>
                    <p>We will verify your account and you will get an activation email from admin. You can check your course details and progress from your profile page.</p>
                    <div class="line"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 p-0">
                <div class="login-right">
                <form class="login-form" action="process_login.php" method="POST" enctype="multiple/form-data">

                    <h2>SignIn</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                    <div class="form-group one">
                      <label>E-mail</label>
                      <input type="email" name="email" placeholder="example@mail.com" class="form-control">
                    </div>
                    <div class="form-group two">
                      <label>Password</label>
                      <input type="password" name="password" placeholder="6+ strong character" class="form-control">
                    </div>
                    <div class="mb-3">
                      <span>Dont have an account? <a href="" class="regbox">Register</a></span>
                    </div>
                    <div class="form-group">
                      <input type="submit" name="login" value="Login" class="login-btn">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-2"></div>
        </div>
      </div>
      <!-- login end -->
      <!-- reg start -->
      <div class="container reg" style="z-index: 9999;">
        
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <div class="row login-main">
              <div class="col-md-6 p-0">
                <div class="login-left">
                  <a href=""><img src=""></a>
                  <div>
                    <h2>Please Sign up to continue!</h2>
                    <p>We will verify your account and you will get an activation email from admin. You can check your course details and progress from your profile page.</p>
                    <div class="line"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 p-0">
                <div class="login-right">
                  <form class="login-form" action="process_registration.php" method="POST" enctype="multiple/form-data">
                    <h2>SignUp</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                    <div class="form-group one">
                      <label>E-mail</label>
                      <input type="email" name="email" placeholder="example@mail.com" class="form-control">
                    </div>
                    <div class="form-group two">
                      <label>Password</label>
                      <input type="password" name="password" placeholder="6+ strong character" class="form-control">
                    </div>
                    <div class="form-group three">
                      <label>Confirm Password</label>
                      <input type="password" name="conpassword" placeholder="6+ strong character" class="form-control">
                    </div>
                    <div class="mb-3">
                      <span>Already have an account? <a href="" class="login-box">Login</a></span>
                    </div>
                    <div class="form-group">
                      <input type="submit" name="signup" value="Create Account" class="login-btn">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-2"></div>
        </div>
      </div>
      <!-- reg end -->
    </section>
    <!-- banner section code end -->
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- custom js -->
    <script>
      $('.login-form .one input').focus(function(){
    $('.login-form .one label').css('color','#010ac2');
    $('.login-form .two label').css('color','#000');
    $('.login-form .three label').css('color','#000');
  });
  $('.login-form .two input').focus(function(){
    $('.login-form .one label').css('color','#000');
    $('.login-form .two label').css('color','#010ac2');
    $('.login-form .three label').css('color','#000');
  });
  $('.login-form .three input').focus(function(){
    $('.login-form .one label').css('color','#000');
    $('.login-form .two label').css('color','#000');
    $('.login-form .three label').css('color','#010ac2');
  });


  $('.login-box').click(function(e){
    e.preventDefault();
    $('.reg').css('transform','translatex(-700px)');
    $('.reg').css('transition','0.5s');
    $('.reg').css('opacity','0');

  });
  $('.regbox').click(function(f){
    f.preventDefault();

    $('.reg').css('transform','translatex(0px)');
    $('.reg').css('transition','0.5s');
    $('.reg').css('opacity','1');

  });
    </script>
  </body>
</html>