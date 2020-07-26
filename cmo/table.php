<?php
include('../connect.php');
session_start();
if(!isset($_SESSION['com_id'])){
  header('location: ../committee_login.html');
}
$com_id = $_SESSION['com_id']; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<style>
  .card{
    border-radius: 1rem;
    -webkit-box-shadow: 10px 10px 25px 0px rgba(221,221,221,1);
-moz-box-shadow: 10px 10px 25px 0px rgba(221,221,221,1);
box-shadow: 10px 10px 25px 0px rgba(221,221,221,1);
  }
  .container{
    padding-top: 2rem;
    padding-bottom: 2rem;
  }
  button.mybtn {
      display: block;
      width: 80%;
      height: 40px;
      border-radius: 25px;
      outline: none;
      border: none;
      text-align: center;
      background-image: linear-gradient(to right, #4e54c8, #8f94fb);
      background-size: 200%;
      font-size: 0.8rem;
      font-weight:400;
      color: #fff;
      font-family: 'Poppins', sans-serif;
      text-transform: uppercase;      
      cursor: pointer;
      transition: .5s;
      -webkit-box-shadow: 7px 10px 18px -15px rgba(0,0,0,0.75);
-moz-box-shadow: 7px 10px 18px -15px rgba(0,0,0,0.75);
box-shadow: 7px 10px 18px -15px rgba(0,0,0,0.75);
    }
    .navbar{
    -webkit-box-shadow: 0px 10px 15px -8px rgba(203,203,203,1);
-moz-box-shadow: 0px 10px 15px -8px rgba(203,203,203,1);
box-shadow: 0px 10px 15px -8px rgba(203,203,203,1);
}
    button.mybtn:hover {
      background-position: right;
      -webkit-box-shadow: 10px 10px 18px -4px rgba(0, 0, 0, 0.75);
      -moz-box-shadow: 10px 10px 18px -4px rgba(0, 0, 0, 0.75);
      box-shadow: 10px 10px 18px -4px rgba(0, 0, 0, 0.75);
    }
    @media screen and (max-width:991px){
      button.mybtn{width:100%; border-radius: 17px;}
    }
</style>

</head>
<body>
<nav class="navbar navbar-light bg-white sticky-top justify-content-around ">
  <img src="logo.png" width="80" height="80" alt="">
  <ul class="navbar-nav">
        <li class="nav-item">
            <h4>PATIENT DETAILS LIST</h4>
        </li>
   </ul>
   <a href="cmo-db.php"><button class="btn" style="background-color:#FA0204;color:#fff;">BACK</button></a>
</nav>


<div class="container jumbotron-fluid">


<div id ="content">

<div class="card">
            <div class="card-body table-responsive">
                <table class="table table-borderless table-hover text-center" id='tab'>
                    <thead>
                      <tr>
                        
                        <th scope="col">REGISTRATION NO.</th>
                        <th scope="col">CHEQUE NO</th>
                        <th scope="col">NAME</th>
                        <th scope="col">AGE</th>
                        <th scope="col">CONTACT</th>
                        <th scope="col">EDIT FORM</th>
                        <th scope="col">DAILY UPDATES</th>
                      </tr>
                    </thead>
</tbody>
 <?php
//  WHERE unique_id='$unique_id'
$query="SELECT * FROM `staff_details`";
$res=mysqli_query($conn,$query);
if(mysqli_num_rows($res)>0)
{
            while($row=mysqli_fetch_assoc($res))
            {
                    $cheque_no=$row['cheque_no'];
                    $regis_no=$row['regis_no'];
                    $name=$row['name'];
                    $age=$row['age'];
                    $contact=$row['mobile_no'];
                    

                    echo "<tr>";
                    
                    echo "<td>$regis_no</td>";
                    echo "<td>$cheque_no</td>";
                    echo "<td>$name</td>";
                    echo "<td>$age</td>";
                    echo "<td>$contact</td>";?>
                    <form action="edit.php" method="POST">
                    <?php
                    echo "<td><div class='d-flex justify-content-around'>
                    <button type='submit' class='mybtn' name='submit' value='$regis_no' >EDIT
                    </div></td>";
                    ?>
                    </form>

                    <form action="update.php" method="POST">
                    <?php
                    echo "<td><div class='d-flex justify-content-around'>
                    <button type='submit' class='mybtn' name='submit' value='$regis_no' >UPDATE
                    </div></td>";
                    echo "</tr>";
                    ?>
                    </form>
                    <?php
            }
}
else
{
    echo "<tr align='center'><td>-</td><td>-</td><td>-</td><td> No patient has been registered yet </td><td>-</td><td>-</td></tr>";
}
?>

</tbody>
</table>
</form>
</body>
</html>