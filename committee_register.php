<?php

if(isset($_POST['register'])){
    include('connect.php');
    // echo($_POST['uniqueid']);
    $cheque = $_POST['cheque'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $pwd = $_POST['pwd'];
    $email = $_POST['email'];
    // echo $pwd;

    // $encrypted = hash('sha512', $pwd);
    // echo $pwd;
    // $query = "insert into `committee_members` ('unique_id', 'firstname', 'lastname', 'password') values ('$uniqueid', '$firstname', '$lastname', '$pwd' )";
    $query = "INSERT INTO `committee_members`(`com_id`, `name`, `phone`, `password`,`email`) VALUES ('$cheque', '$name', '$phone', '$pwd','$email')";
    $result = mysqli_query($conn,$query);
    if($result)
    {
        echo "<script>alert('Registration details sent to CMO for authorization')</script>";
        header('refresh:0,url=committee_login.html');
    }
    else
    {
        echo "<script>alert(' Registration unsuccessful! Please Try Again')</script>";
    }
   
}

?>