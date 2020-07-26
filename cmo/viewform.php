<?php
    ob_start();
    session_start();
    // if (!isset($_SESSION['unique_id'])) {
    //     header('location:../logout');
    // }
    include '../connect.php';
    if(isset($_POST['submit']))
    {
        if(!isset($_SESSION['com_id'])){
            header('location: ../committee_login.html');
          }
        
        $regis_no=$_POST['submit'];
        $_SESSION['regis_no']=$regis_no;
        // $conn = db_connection();
        // $unique_id=$_SESSION['unique_id'];
        // WHERE `unique_id` = '$unique_id'
        $query="SELECT * FROM `staff_details` WHERE `regis_no`='$regis_no'";
        $res=mysqli_query($conn,$query);
        $row_details=mysqli_fetch_assoc($res);
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Overall List</title>

  <!-- Custom fonts for this template -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script>
        $(function() {
            $('.dates #usr1').datepicker({
                'format': 'yyyy-mm-dd',
                'autoclose': true
            });
        });

        function done() {
          alert("Your entry is saved!");
        }
    </script>
  <style>
      button.mybtn {
      display: block;
      width: 100%;
      height: 46px;
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
  
 
</style>
</head>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="cmo-db.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">BEST Admin </div>
      </a>

   <br>   <!-- Divider -->
      <hr class="sidebar-divider my-0">
<br>

<!-- Divider -->


   
<!-- Nav Item - Dashboard -->




<!-- Heading -->
<div class="sidebar-heading">
  Lists:
</div>
<li class="nav-item">
  <a class="nav-link" href="Overall-List.php">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Overall List</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="Oxygen-List.php">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Oxygen List</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="Discharged-List.php">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Discharged List</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="Expired-List.php">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Expired List</span></a>
</li>







<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">
<li class="nav-item">
  <a class="nav-link" href="auth_members.php">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Authorise Members</span></a>
</li>
    
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
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
          <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"> -->
            <!-- <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div> -->
            <h3>BRIHANMUMBAI ELECTRICITY SUPPLY AND TRANSPORT</h3>
          <!-- </form> -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

           

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">CMO</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <!-- <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                
                <div class="dropdown-divider"></div> -->
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <center><h1 class="h3 mb-2 text-gray-800">PLEASE ENTER THE DETAILS</h1></center>
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            
            <div class="card-body">
            <form method="POST" action="Overall-List.php">
    
    <img class="logo" src="/images/best_logo1.png" alt="" >
    <!-- <h1 style="text-align: center; vertical-align: top;">Please enter the details </h1> -->
<br>
    <div class="form-row">

        <div class="form-group col-md-6">
            <label for="inputEmail4">Name</label>
            <input type="text" class="form-control" name="name" value="<?php echo $row_details['name']; ?>"  id="inputName4" readonly required>
        </div>

        <div class="form-group col-md-3">
            <label for="inputnumber">Age</label>
            <input type="number" class="form-control" id="inputnumber" name="age" readonly value="<?php echo $row_details['age'];?>">
        </div>
        


        <!--  <select class="custom-select" id="inputGroupSelect02" name="arrA[college_pl_state]">
                  <option value="" <?php echo ($rowA["college_pl_state"] === "")?"selected" : ""; ?>>Choose...</option>
                  <option  <?php echo ($rowA["college_pl_state"] === "Linguistic")?"selected" : ""; ?> value="Linguistic">Linguistic</option>
                  <option  <?php echo ($rowA["college_pl_state"] === "Religious")?"selected" : ""; ?> value="Religious">Religious</option>
                </select>
              </div> -->





        <div class="form-group col-md-3">
            <label for="inputState">Sex</label>
            <input type="text" class="form-control" id="inputnumber" name="sex" readonly value="<?php echo $row_details['sex'];?>">            
            
        </div>

    </div>    
    <div class="form-row">

        <div class="form-group col-md-4">
            <label for="inputnumber">Check No.</label>
            <input type="" class="form-control" id="inputnumber" name="cheque_no" readonly value="<?php echo $row_details['cheque_no'];?>" required>
        </div>

        <div class="form-group col-md-4">
            <label for="inputnumber">Mobile No.</label>
            <input type="" class="form-control" id="inputnumber" name="mobile_no" readonly value="<?php echo $row_details['mobile_no']; ?>">
        </div>
        
        <div class="form-group col-md-4">
            <label for="inputEmail4">Designation</label>
            <input type="text" class="form-control" name="designation" value="<?php echo $row_details['designation'] ;?>" id="inputName4" readonly >
        </div>

    </div>

    <div class="form-row">  
        
        <div class="form-group col-md-3">
            <label for="inputEmail4">Department</label>
            <input type="text" class="form-control" name="department" value="<?php echo $row_details['department'] ;?>"  id="inputName4" readonly >
        </div>
    
        <div class="form-group col-md-9">
            <label for="inputAddress">Res. Address</label>
            <input type="text" class="form-control" name="address" readonly value="<?php echo $row_details['address']?>" id="inputAddress">
        </div>  

    </div>

    <div class="form-row"> 

        <div class="form-group col-md-4">
            <label for="inputEmail4">Co-morbadity</label>
            <input type="text" name="comorbidity"  value="<?php echo $row_details['comorbidity']?>" class="form-control" id="inputName4" readonly >
        </div>
        
        <div class="form-group col-md-4">
            <label for="inputEmail4">Addictions</label>
            <input type="text" name="addictions" value="<?php echo $row_details['addictions'];?>" class="form-control" id="inputName4" readonly >
        </div>
        
        <div class="form-group col-md-4">
            <label for="inputEmail4">Depot</label>
            <input type="text" name="depot" value="<?php echo $row_details['depot']; ?>" class="form-control" id="inputName4" readonly >
        </div>
    
    </div>

    <div class="form-row">
        
        <div class="dates col-md-4">
            <label>Last working Date</label>
            <input type="date" class="form-control"  id="usr1" name="last_working" value="<?php echo $row_details['last_working']?>" placeholder="YYYY-MM-DD" readonly autocomplete="off" required>
        </div>

        <div class="form-group col-md-4">
            <label for="inputEmail4">Travel History</label>
            <input type="text" name="travel_history" value="<?php echo $row_details['travel_history']?>" class="form-control" id="inputName4" readonly >
        </div>

        <div class="form-group col-md-4">
            <label for="inputEmail4">Exposure</label>
            <input type="text" name="exposure" value="<?php echo $row_details['exposure']?>" class="form-control" id="inputName4" readonly >
        </div>
    
    </div>
    
    <div class="form-row"> 

        
        <div class="form-group col-md-3">
            <label for="inputEmail4">Symptoms</label>
            <input type="text" name="symptoms" value="<?php echo $row_details['symptoms']?>" class="form-control" id="inputName4" readonly >
        </div>

        <div class="dates col-md-3">
            <label>Date of Testing</label>
            <input type="date" class="form-control" id="usr1" name="testing_date" value="<?php echo $row_details['testing_date']?>" placeholder="YYYY-MM-DD" readonly autocomplete="off" >
        </div>

        <div class="form-group col-md-6">
            <label for="inputState">Hospital Name</label>
            <input type="text" class="form-control" id="inputnumber" name="hospital" readonly value="<?php echo $row_details['hospital'];?>">            
           
        </div>
    
    </div>

    <div class="form-row">  
    
        <div class="dates col-md-4">
            <label>Date of Addmission</label>
            <input type="date" class="form-control" id="usr1" name="admission_date" value="<?php echo $row_details['admission_date']?>" placeholder="YYYY-MM-DD" readonly autocomplete="off" >
        </div>
         
        <div class="form-group col-md-4">
            <label for="inputState">Oxygen</label>
            <input type="text" class="form-control" id="inputnumber" name="oxygen" readonly value="<?php echo $row_details['oxygen'];?>">            
           
        </div>
        
        <div class="form-group col-md-4">
            <label for="inputState">Discharge/Expire</label>
            <input type="text" class="form-control" id="inputnumber" name="discharge" readonly value="<?php echo $row_details['discharge'];?>">            
           
        </div>

    </div>

    <div class="form-row">  

        <div class="dates col-md-3">
            <label>Date of Discharge/Expire</label>
            <input type="date" class="form-control" id="usr1" name="dis_date" value="<?php echo $row_details['dis_date']?>" readonly placeholder="YYYY-MM-DD" autocomplete="off" >
        </div>

        <div class="form-group col-md-3">
            <label for="inputnumber">Discharge No.</label>
            <input type="" name="dis_no" value="<?php echo $row_details['dis_no']?>" class="form-control" readonly id="inputnumber">
        </div>
        
        <div class="form-group col-md-6">
            <label for="inputEmail4">Family Details</label>
            <input type="text" class="form-control" value="<?php echo $row_details['family']?>" name="family" readonly id="inputName4" readonly >
        </div>

    </div>

    <div class="form-row">

        <div class="form-group col-md-12">
            <label for="inputAddress">Additional info.</label>
            <input type="text" class="form-control" value="<?php echo $row_details['followup']?>" name="followup"  readonly id="inputAddress">    
        </div>

        <!-- <div class="form-group col-md-3">
            <label for="inputState">Entry By</label>
            <select id="inputState" class="form-control">
                <option selected>Choose...</option>
                <option>Majida Shaikh</option>
                <option>Nilkanth Wani</option>
                <option>Chandrakant Sonaje</option>
                <option>Ganesh Pingle</option>
                <option>Nilesh Malkar</option>
                <option>Santosh Pandit</option>
                <option>Ajit Devarkar</option>
                <option>Mahendra Baviskar</option>
                <option>Mhataji Gunjal</option>
                <option>Swapnil Mayekar</option>
            </select>
        </div>
        
        <div class="form-group col-md-3">
            <label for="inputState">Updated By</label>
            <select id="inputState" class="form-control">
                <option selected>Choose...</option>
                <option>Majida Shaikh</option>
                <option>Nilkanth Wani</option>
                <option>Chandrakant Sonaje</option>
                <option>Ganesh Pingle</option>
                <option>Nilesh Malkar</option>
                <option>Santosh Pandit</option>
                <option>Ajit Devarkar</option>
                <option>Mahendra Baviskar</option>
                <option>Mhataji Gunjal</option>
                <option>Swapnil Mayekar</option>
            </select>
        </div> -->

    </div>
<br>

    <div class="form-row">
        <div class="form-group col-md-5">
           
        </div>
        <div class="form-group col-md-2">
        
        <div style="text-align: center;">
            <button type="submit" name="update" value="UPDATE" class="mybtn" style="border-radius: 24px;"><b>BACK</b> </button>
        </div>
        
        <div class="form-group col-md-5">

        </div>
    </div>

</form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      

    

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->


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
  <?php
  

}
    ?>

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

</body>

</html>
