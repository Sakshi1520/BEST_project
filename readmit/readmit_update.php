<?php
@session_start();
include '../connect.php';
$com_id=$_SESSION['com_id'];
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
    <!-- Custom fonts for this template -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<style>
      button.mybtn {
      display: block;
      width: 100%;
      height: 40px;
      border-radius: 25px;
      outline: none;
      border: none;
      text-align: center;
      background-image: linear-gradient(to right, #4e54c8, #8f94fb);
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
    button.mybtn:hover {
      background-position: right;
      -webkit-box-shadow: 10px 10px 18px -4px rgba(0, 0, 0, 0.75);
      -moz-box-shadow: 10px 10px 18px -4px rgba(0, 0, 0, 0.75);
      box-shadow: 10px 10px 18px -4px rgba(0, 0, 0, 0.75);
    }
    .form-control{
        border-left: 0px;
        border-right: 0px;
        border-top: 0px;
    }
</style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    
 
    <!-- End of Sidebar -->
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <form class="form-inline">
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>
          </form>

          <!-- Topbar Search -->
          <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> -->
          <h3>BRIHANMUMBAI ELECTRICITY SUPPLY AND TRANSPORT</h3>
     
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

          <li class="nav-item dropdown no-arrow">
            <a href="readmit.php"> <button type="submit" id="submit" name="submit" class="mybtn" style="background:#FA0204;color:#fff; border-radius:10px; width:5rem;" ><b>BACK</b> </button></a>
            </li>

          </ul>

        </nav>
        <div class="container-fluid">

<!-- Page Heading -->
<!-- <h1 class="h3 mb-2 text-gray-800">Overall List</h1> -->
<!-- DataTales Example -->
<div class="card shadow mb-4">
  
  <div class="card-body">
<form method="POST" action="readmit_update.php">
        <div class="row" style="margin-left:1rem;margin-right:1rem;margin-top:1rem;margin-bottom:0.5rem;">
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
                <button type="submit" name="up" value="submit" class="mybtn" style="border-radius: 20px; width:6rem;">SUBMIT</button>
            </div>
        </div>
</form>
  </div>
</div>
<br>
</div>
<?php
if(isset($_POST['up']))
 { $regis_no=$_SESSION['regis_no'];
   $com_id=$_SESSION['com_id'];
   $date=$_POST['date'];
   $daily=$_POST['daily'];
   $query_insert="INSERT INTO `updates`(`regis_no`, `com_id`, `date`, `daily`) VALUES ('$regis_no','$com_id','$date','$daily')";
   $res_insert=mysqli_query($conn,$query_insert);
 }
 ?>
<br>
<div class="container-fluid">

<div class="card shadow mb-4">
            
           
            <div class="card-body table-responsive">
                <table class="table table-border table-hover text-center" id='tab'>
                <thead style="background-color:#88C4EC;">  
                   
                      <tr>
                        
                        <!-- <th scope="col">REGISTRATION NO.</th> -->
                        
                        <th scope="col">DATE</th>
                        <th scope="col">UPDATED BY</th>

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
                    $id=$row['com_id'];
                    $daily=$row['daily'];
                    // echo date("d/m/Y")."<br />";
                    $date1 = strtotime($date);
                    $dis= date('d/m/Y', $date1);

                    

                    echo "<tr>";
                    
                    // echo "<td>$regis_no</td>";
                    echo "<td>$dis</td>";
                    echo "<td>$id</td>";
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
</div>
      </div>
</form>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/datatables-demo.js"></script>

</body>
</html>