<?php
include '../connect.php';
    if(isset($_POST['submit']))
    {
        // if(!isset($_SESSION['com_id'])){
        //     header('location: ../committee_login.html');
        //   }
        // $com_id = $_SESSION['com_id']; 
        $regis_no=$_POST['submit'];
        $_SESSION['regis_no']=$regis_no;
        // $conn = db_connection();
        // $unique_id=$_SESSION['unique_id'];
        // WHERE `unique_id` = '$unique_id'
        $query="DELETE FROM `staff_details` WHERE `regis_no`='$regis_no'";
        $result=mysqli_query($conn,$query);

        if($result)
        {
            echo "<script>alert('DELETE SUCCESSFUL.')</script>";
            header('refresh:0,url=Overall-List.php');
        }
        else
        {
            echo "<script>alert('DELETE UNSUCCESSFUL Please Try Again')</script>";
            header('refresh:1,url=Overall-List.php');
        }
    }
       
?>
