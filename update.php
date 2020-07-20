<?php
@session_start();
include 'connect.php';

if(isset($_POST['submit']))
{
    $regis_no=$_POST['submit'];
    $_SESSION['regis_no']=$regis_no;
}

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
      width: 6rem;
      height: 40px;
      border-radius: 25px;
      outline: none;
      border: none;
      text-align: center;
      background-image: linear-gradient(to right, #FA0204, #f0cb35,#f0cb35);
      background-size: 200%;
      font-size: 1rem;
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

    .form-control{
        border-top: 0px;
        border-left: 0px;
        border-right: 0px;
        
    }
  
</style>
</head>
<body>
<nav class="navbar navbar-light bg-white sticky-top justify-content-around ">
  <img src="logo.png" width="80" height="80" alt="">
  <ul class="navbar-nav">
        <li class="nav-item">
            <h4>DAILY UPDATES</h4>
        </li>
   </ul>
   <a href="table.php"><button class="btn" style="background-color:#FA0204;color:#fff;">BACK</button></a>
</nav>

<div class="container jumbotron-fluid">

<div class="card">
<form method="POST" action="update.php">
        <div class="row" style="margin:2rem;">
            <div class="col-md-3">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" >DATE</span>
                        </div>
                        <input type="date" class="form-control" name="date" required >
                    </div>
            </div>
            <div class="col-md-9">
                    <div class="input-group mb-3">
                        <!-- <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">UPDATE</span>
                        </div> -->
                        <input type="text" name="daily" class="form-control" placeholder="Please enter the daily update here" required >
                    </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div style="text-align: center;">
                <button type="submit" name="up" value="submit" class="mybtn" style="border-radius: 24px;">SUBMIT </button>
            </div>
        </div>
</form>
<br>
</div>
<?php
if(isset($_POST['up']))
 { $regis_no=$_SESSION['regis_no'];
   $com_id="tdfs";
   $date=$_POST['date'];
   $daily=$_POST['daily'];
   $query_insert="INSERT INTO `updates`(`regis_no`, `com_id`, `date`, `daily`) VALUES ('$regis_no','$com_id','$date','$daily')";
   $res_insert=mysqli_query($conn,$query_insert);
 }
 ?>
<br>

<div class="card">
            <div class="card-body table-responsive">
                <table class="table table-borderless table-hover text-center" id='tab'>
                    <thead>
                      <tr>
                        
                        <!-- <th scope="col">REGISTRATION NO.</th> -->
                        
                        <th scope="col">DATE</th>
                        <th scope="col">UPDATE</th>
                        
                      
                      </tr>
                    </thead>
</tbody>
 <?php
//  WHERE unique_id='$unique_id'
$query="SELECT * FROM `updates` WHERE `regis_no`='$regis_no' ";
$res=mysqli_query($conn,$query);
if(mysqli_num_rows($res)>0)
{
            while($row=mysqli_fetch_assoc($res))
            {
                    // $regis_no=$row['regis_no'];
                    $date=$row['date'];
                    $daily=$row['daily'];
                    // echo date("d/m/Y")."<br />";
                    $date1 = strtotime($date);
                    $dis= date('d/m/Y', $date1);

                    

                    echo "<tr>";
                    
                    // echo "<td>$regis_no</td>";
                    echo "<td>$dis</td>";
                   
                    echo "<td>$daily</td>";
                    
                   
                
            }
}
else
{
    echo "<tr align='center'><td>-</td><td> No updates yet </td><td>-</td></tr>";
}





// main vala bracket
?>

</tbody>
</table>
</div>
</div>
</form>


</body>
</html>