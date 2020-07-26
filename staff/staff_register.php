<?php
include('../connect.php');
session_start();
  if(!isset($_SESSION['com_id'])){
    header('location: ../committee_login.html');
  }

extract($_POST);
$com_id=$_SESSION['com_id'];
// echo("hi");
if(isset($_POST['submit'])){

  $query_check="SELECT * FROM `staff_details` WHERE `cheque_no`='$cheque_no'";
  $result_check = mysqli_query($conn,$query_check);
    if(mysqli_num_rows( $result_check ))
          {
            echo"<script>alert('Patient already exists! Cannot register again')</script>";
            header('refresh:0,url=staff_details.php');
          }

    else{

   
          $query = "INSERT INTO `staff_details`(`com_id`, `name`, `age`, `sex`, `cheque_no`, `mobile_no`, `designation`, `department`, `depot`, `addictions`, `address`, `comorbidity`, `last_working`, `travel_history`, `exposure`, `symptoms`, `testing_date`, `hospital`, `admission_date`, `oxygen`, `discharge`, `dis_date`, `dis_no`, `family`, `followup`) VALUES ('$com_id','$name', '$age', '$sex', '$cheque_no', '$mobile_no', '$designation', '$department', '$depot', '$addictions', '$address', '$comorbidity', '$last_working', '$travel_history', '$exposure', '$symptoms', '$testing_date', '$hospital', '$admission_date', '$oxygen', '$discharge', '$dis_date', '$dis_no', '$family', '$followup')";
          $result = mysqli_query($conn,$query);
        
          if($result)
          {
              echo"<script>alert('Patient registered sucessfully !')</script>";
              header('refresh:0,url=staff.php');
          }
          else{
            echo"<script>alert('Patient registeration not sucessful!')</script>";
            header('refresh:0,url=staff.php');
              
          }

    }
}
?>
