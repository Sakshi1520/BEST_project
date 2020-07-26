<?php

include('../connect.php');
extract($_POST);
// echo("hi");
                  
if(!isset($_SESSION['com_id'])){
    header('location: committee_login.html');
  }
  echo $_SESSION['com_id'];
  $com_id = $_SESSION['com_id']; 
if(isset($_POST['submit'])){
    // echo("hehe");
    // $query = "insert into `staff_details` (`first_name`, `last_name`, `password`) values ('$firstname', '$lastname', '$pwd')";

    $query = "INSERT INTO `staff_details`(`com_id`, `name`, `age`, `sex`, `cheque_no`, `mobile_no`, `designation`, `department`, `depot`, `addictions`, `address`, `comorbidity`, `last_working`, `travel_history`, `exposure`, `symptoms`, `testing_date`, `hospital`, `admission_date`, `oxygen`, `discharge`, `dis_date`, `dis_no`, `family`, `followup`) VALUES ('$com_id', '$name', '$age', '$sex', '$cheque_no', '$mobile_no', '$designation', '$department', '$depot', '$addictions', '$address', '$comorbidity', '$last_working', '$travel_history', '$exposure', '$symptoms', '$testing_date', '$hospital', '$admission_date', '$oxygen', '$discharge', '$dis_date', '$dis_no', '$family', '$followup')";
    $result = mysqli_query($conn,$query);
    // echo $query;
    header('location:staff_details.html');
}
?>
