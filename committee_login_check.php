<?php

if(isset($_POST['login'])){
    // $pwd=$_POST['pwd'];
    include('connect.php');
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    
    $query1 = "SELECT * FROM `committee_members` WHERE `email`='$email'";
    // echo $query1;
    $res1 = mysqli_query($conn,$query1);
    $data = $res1->fetch_array(MYSQLI_ASSOC);
    if($data){
        $com_id = $data['com_id'];
        $pass = $data['password'];
        $cmo_auth = $data['cmo_auth'];
        $role = $data['role'];
    }
  

    if(mysqli_num_rows($res1) > 0)
    {
        if((password_verify($pwd,$pass)) || ($pass == $pwd)){
            
            if($cmo_auth == 1)
            {
                session_start();
                // header('login_home.html');
                $_SESSION['com_id'] = $com_id;
                if($role == 'oxygen'){
                    header("location:oxygen/oxygenguy.php");
                }
                elseif($role == 'CMO'){
                    header('location: ./cmo/cmo-db.php');
                }
                elseif($role == 'readmit'){
                    header('location: ./readmit/readmit.php');
                }
                else{
                    header('location: staff/staff.php');
                }
                // echo $_SESSION['com_id'];
                // echo("welcome!");
            }
            else{
                echo '<script>
                        alert("Not Authorized !");
                        window.location.href="committee_login.html";
                    </script>';
                // header('location: committee_login.html');
               
            }
        }
        else{
            // echo("wrong password");
            echo '<script>
                        alert("wrong password");
                        window.location.href="committee_login.html";
                    </script>';
            // header("location:committee_login.html");
        }
    }
    else{
        // echo('invalid unique id');
        echo '<script>
                        alert("invalid email");
                        window.location.href="committee_login.html";
                    </script>';
        // header("location:committee_login.html");
    }
}

?>