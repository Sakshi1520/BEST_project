<?php
include('../connect.php');
session_start();
  if(!isset($_SESSION['com_id'])){
    header('location: ../committee_login.html');
  }

  $cheque_no=$_POST['checkno'];
  $query_check="SELECT * FROM `staff_details` WHERE `cheque_no`='$cheque_no'";
  $result_check = mysqli_query($conn,$query_check);

  if(isset($_POST['readmit']))
  {
    if(mysqli_num_rows( $result_check ))
          {
            $query = "SELECT * FROM `committee_members` WHERE `role`='readmit'";
            $result = mysqli_query($conn,$query);
            while($row = mysqli_fetch_assoc($result))
            {
              $readmit_id = $row['com_id'];
              // echo $readmit_id;
              $query1 = "UPDATE `staff_details` SET `com_id`='$readmit_id' WHERE `cheque_no` = '$cheque_no'";
              $result1 = mysqli_query($conn,$query1);

            }
            header('refresh:0,url=staff.php');
          }
   else{
             echo"<script>alert('Patient doesnt exists! Please enter his details in the form')</script>";
             header('refresh:0,url=staff.php');
        }
  }
else{
    if(mysqli_num_rows( $result_check ))
    {
      echo"<script>alert('Patient already exists! Cannot register again')</script>";
      header('refresh:0,url=staff.php');
    }
  else{
       echo"<script>alert('Patient doesnt exists! Please enter his details in the form')</script>";
      header('refresh:0,url=staff_details.php');
  }
}
    


?>
