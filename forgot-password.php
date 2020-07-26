<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Forgot Password</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background: linear-gradient(to right, #FF4E50 ,#F9D423); ">

<br>
<br>
<br>
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5" >
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                    <p class="mb-4">We get it, stuff happens. Just enter your email address below and we'll send you an OTP to reset your password!</p>
                  </div>
                  <form class="user" action="" method="POST">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="unique_id" placeholder="Enter your username">
                    </div>
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="email" placeholder="Enter your registered email address">
                    </div>
                    <br>
                    <button type="submit" name="submit" value="Submit"class="btn btn-primary btn-user btn-block">
                      Reset Password
                    </button>
                  </form>
                  <hr>
                  <!-- <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div> -->
                  <div class="text-center">
                    <a class="small" href="committee_login.html">Already have an account? Login!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>


  <?php
  include 'connect.php';
  include 'mailsetup.php';
  // $conn=db_connection();
  
  if(@$_POST['submit'])
  {
      $unique_id=$_POST['unique_id'];
      $email=$_POST['email'];
  
          $login_verify_query="SELECT * FROM `committee_members` WHERE `com_id`='$unique_id' AND `email`='$email'";
          $res_login=mysqli_query($conn,$login_verify_query);
          if(@mysqli_num_rows($res_login)>0)
          {
              
            //  session_start();
              $_SESSION['unique_id'] = $unique_id;
              $_SESSION['email'] = $email;
              
              // generate otp
              $str='1234567890qwaszxedcrfvtgbyhnujmkopQWERTYUOPASDFGHJKZXCVBNM0987654321';
              $shuffled = str_shuffle($str);
              $otp = substr($shuffled, 5, 6);
              $_SESSION['otp']=$otp;
              $to=$email;
              $sub="OTP for reset password";
              $body="Your one time password for reset password is: - ".$otp;
              
              //phpmailer
              
              $mail->addAddress($to);     // Add a recipient
              $mail->Subject = $sub;
              $mail->Body = $body;
              if($mail->send())
              {
                  
                  echo "<script>alert('Check your registered mail id for OTP.')</script>";
                  header('refresh:0,url=updatepass.php');
              }
              else 
              {
                  
                  echo $mail->ErrorInfo;
              }
            
          }
          else
          {
        
        echo "<script>alert('INVALID USERNAME OR EMAIL')</script>";
          }
  
      
      
  }
  ?>
  
  
  <?php
  ob_flush();
  ?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
