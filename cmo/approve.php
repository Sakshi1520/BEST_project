<?php
include('../connect.php');
session_start();
if(isset($_POST['approve_submit'])){
    $com_id = $_POST['approve_submit'];
    
    $query1 = "UPDATE `committee_members` SET `cmo_auth`= 1 where `com_id`= '$com_id'";
    $result1 = mysqli_query($conn,$query1);

    header("location: auth_members.php");

}
else if(isset($_POST['disapprove_submit'])){
    $com_id = $_POST['disapprove_submit'];
    
    $query1 = "UPDATE `committee_members` SET `cmo_auth`= 0 where `com_id`= '$com_id'";
    $result1 = mysqli_query($conn,$query1);

    header("location: auth_members.php");
    

}
?>