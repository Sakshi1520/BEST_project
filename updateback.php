<?php
@session_start();

include 'connect.php';
$regis_no=$_SESSION['regis_no'];
 if(isset($_POST['up']))
 {
   $com_id="tdfs";
   
   $date=$_POST['date'];
   $daily=$_POST['daily'];

   $query_insert="INSERT INTO `updates`(`regis_no`, `com_id`, `date`, `daily`) VALUES ('$regis_no','$com_id','$date','$daily')";
   $res_insert=mysqli_query($conn,$query_insert);
   if($res_insert)
   {
       echo "<script>alert('UPDATE SUCCESSFUL.')</script>";
       header('refresh:0,url=table.php');
   }
   else
   {
       echo "<script>alert('DAILY UPDATE ADDED UNSUCCESSFUL Please Try Again')</script>";
   }

 }

?>