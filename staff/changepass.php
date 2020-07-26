<?php
include '../connect.php';
ob_start();
session_start();
if(!isset($_SESSION['com_id'])){
  header('location: ../committee_login.html');
}
$com_id = $_SESSION['com_id']; 

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
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background: linear-gradient(to right, #FF4E50 ,#F9D423); ">
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
                    <h1 class="h4 text-gray-900 mb-2">Change Your Password</h1>
                    <br>
                    <br>
                    <!-- <p class="mb-4">We get it, stuff happens. Just enter your email address below and we'll send you an OTP to reset your password!</p> -->
                  </div>
                  <form class="user" action="" method="POST">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="old_password" aria-describedby="emailHelp" name="unique_id" placeholder="Enter your Old Password">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="new_password" aria-describedby="emailHelp" name="unique_id" placeholder="Enter your new password">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="confirm_password" aria-describedby="emailHelp" name="email" placeholder="Confirm your new passowrd">
                    </div>
                    <br>
                    
                    <button type="submit" name="change" class="btn btn-primary btn-user btn-block">
                      Change password
                    </button>
                  </form>
                  <hr>

<br>
                  <a href="staff.php"> <button type="submit" name="change" style="border-radius:20px;" class="btn btn-secondary btn-user btn-block">
                      BACK
                    </button>
                  </a>
                  <!-- <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div> -->
                  <!-- <div class="text-center">
                    <a class="small" href="committee_login.html">Already have an account? Login!</a>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>


 
  <?php
    
    if(@isset($_POST['change']))
    {
        $old=$_POST['old_password'];
        $new=$_POST['new_password'];
        $confirm=$_POST['confirm_password'];
        // $old_password=md5($old);
        // $new_password=md5($new);
        // $confirm_password=md5($confirm);
        $query_check="SELECT * FROM `committee_members` WHERE `com_id`='$com_id' and `password`='$old'";
        $res_check=mysqli_query($conn,$query_check);
        if(mysqli_num_rows($res_check)>0)
        {
            if($new==$confirm)
            {
                $query_update="UPDATE `committee_members` SET `password`='$new' WHERE `com_id`='$com_id'";
                $res_update=mysqli_query($conn,$query_update);
                if($res_update)
                {
					echo "<script>alert('Password Updated')</script>";
					header('refresh:0,url=staff.php');
                }
            }
            else
            {
                echo "<script>alert('Password Mismatch')</script>";
            }
        }
        else
        {
            echo"<script>alert('Incorrect Old Password')</script>";
        }
    }

    ?>
  
  <?php
  ob_flush();
  ?>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>
