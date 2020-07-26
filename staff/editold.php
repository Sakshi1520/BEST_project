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
        $com_id = $_SESSION['com_id']; 
        $regis_no=$_POST['submit'];
        $_SESSION['regis_no']=$regis_no;
        // $conn = db_connection();
        // $unique_id=$_SESSION['unique_id'];
        // WHERE `unique_id` = '$unique_id'
        $query="SELECT * FROM `staff_details` WHERE `regis_no`='$regis_no' AND `com_id`='$com_id'";
        $res=mysqli_query($conn,$query);
        $row_details=mysqli_fetch_assoc($res);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B.E.S.T. Covid19 Data Entry Portal</title>


   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


    <!-- DateTime Picker CDN and CSS -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="lib/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="lib/bootstrap-datepicker.css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<style>
    button.mybtn {
      display: block;
      width: 100%;
      height: 50px;
      border-radius: 25px;
      outline: none;
      border: none;
      text-align: center;
      background-image: linear-gradient(to right, #FA0204,#f0cb35);
      background-size: 200%;
      font-size: 1.2rem;
      font-weight: bold;
      color: #fff;
      font-family: 'Poppins', sans-serif;
      text-transform: uppercase;
      margin: 1rem 1rem;
      cursor: pointer;
      transition: .5s;
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
<div style="text-align: right;">
            <button type="button" class="btn btn-dark"  onclick="window.location.href='table.php';">Back</button>
        </div>
    <form method="POST" action="editback.php">
       
        
        <h1 style="text-align: center; vertical-align: top;">Add the details below </h1>
        
        <div class="form-row">

            <div class="form-group col-md-4">
                <label for="inputEmail4">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $row_details['name']; ?>" id="inputName4">
            </div>

            <div class="form-group col-md-1 ">
                <label for="inputnumber">Age</label>
                <input type="number" class="form-control" id="inputnumber" name="age" value="<?php echo $row_details['age'];?>" >
            </div>
            
            <div class="form-group col-md-2">
                <label for="inputState">Sex</label>
                <select id="inputState" class="form-control" name="sex">
                    <option selected>Choose...</option>
                    <option>Female</option>
                    <option>Male</option>
                </select>
            </div>
            
            <div class="form-group col-md-2">
                <label for="inputnumber">Mobile No.</label>
                <input type="" class="form-control" name="mobile_no" value="<?php echo $row_details['mobile_no']; ?>" id="inputnumber">
            </div>
            
            <div class="form-group col-md-2">
                <label for="inputnumber">Cheque No.</label>
                <input type="" class="form-control" name="cheque_no" value="<?php echo $row_details['cheque_no'];?>" id="inputnumber">
            
            </div>
        </div>
        
        <div class="form-row">
            
            <div class="form-group col-md-3">
                <label for="inputEmail4">Designation</label>
                <input type="text" class="form-control" name="designation" value="<?php echo $row_details['designation'] ;?>"  id="inputtext4">
            </div>
            
            <div class="form-group col-md-3">
                <label for="inputEmail4">Department</label>
                <input type="text" class="form-control" name="department" value="<?php echo $row_details['department'] ;?>" id="inputtext4">
            </div>
            
            <div class="form-group col-md-2">
                <label for="inputEmail4">Depot</label>
                <input type="text" class="form-control" name="depot" value="<?php echo $row_details['depot']; ?>" id="inputtext4">
            </div>
            
            <div class="form-group col-md-3">
                <label for="inputEmail4">Addictions</label>
                <input type="text" class="form-control" name="addictions" value="<?php echo $row_details['addictions'];?>" id="inputtext4">
            </div>
        
        </div>
        
        <div class="form-row">
        <div class="form-group col-md-12">
            <label for="inputAddress">Res. Address</label>
            <input type="text" class="form-control" id="inputAddress" name="address" value="<?php echo $row_details['address']?>" >    
        </div>
</div>
        
        <div class="form-row">
            
            <div class="form-group col-md-3">
                <label for="inputEmail4">Co-morbadity</label>
                <input type="text" name="comorbidity"  value="<?php echo $row_details['comorbidity']?>" class="form-control" id="inputtext4">
            </div>
            
            <div class="dates">
                <label>Last working Date</label>
                <input type="text" style="width:200px;" class="form-control" id="usr1" name="last_working" value="<?php echo $row_details['last_working']?>" placeholder="YYYY-MM-DD" autocomplete="off" >
            </div>
            
            <div class="form-group col-md-3">
                <label for="inputEmail4">Travel History</label>
                <input type="text" class="form-control" name="travel_history" value="<?php echo $row_details['travel_history']?>" id="inputtext4">
            </div>
            
            <div class="form-group col-md-3">
                <label for="inputEmail4">Exposure</label>
                <input type="text" class="form-control" name="exposure" value="<?php echo $row_details['exposure']?>" id="inputtext4">
            </div>
        
        </div>
        
        <div class="form-row">
            
            <div class="form-group col-md-4">
                <label for="inputEmail4">Symptoms</label>
                <input type="text" class="form-control" name="symptoms" value="<?php echo $row_details['symptoms']?>" id="inputtext4">
            </div>
            
            <div class="dates">
                <label>Date of Testing</label>
                <input type="text" style="width:200px;" class="form-control" id="usr1"  name="testing_date" value="<?php echo $row_details['testing_date']?>" placeholder="YYYY-MM-DD" autocomplete="off" >
            </div>
            
            <div class="form-group col-md-3">
                <label for="inputState">Hospital Name</label>
                <select id="inputState" class="form-control" name="hospital">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>
            
            <div class="dates">
                <label>Date of Addmission</label>
                <input type="text" style="width:200px;" class="form-control" id="usr1" name="admission_date" value="<?php echo $row_details['admission_date']?>" placeholder="YYYY-MM-DD" autocomplete="off" >
            </div>
        
        </div>
        
        <div class="form-row">
            
            <div class="form-group col-md-1">
                <label for="inputState">Oxygen</label>
                <select id="inputState" class="form-control" name="oxygen">
                    <option selected>No</option>
                    <option>Yes</option>
                </select>
            </div>
            
            <div class="form-group col-md-2">
                <label for="inputState">Discharge/Expire</label>
                <select id="inputState" class="form-control" name="discharge"> 
                    <option selected>Choose...</option>
                    <option>Discharge</option>
                    <option>Expire</option>
                    <option>None</option>
                </select>
            </div>
            
            <div class="dates">
                <label>Date of Discharge/Expire</label>
                <input type="text" style="width:200px;" class="form-control" id="usr1" name="dis_date" value="<?php echo $row_details['dis_date']?>" placeholder="YYYY-MM-DD" autocomplete="off" >
            </div>
            
            <div class="form-group col-md-2">
                <label for="inputnumber">Discharge No.</label>
                <input type="" class="form-control" name="dis_no" value="<?php echo $row_details['dis_no']?>" id="inputnumber">
            </div>
            
            <div class="form-group col-md-4">
                <label for="inputEmail4">Family Details</label>
                <input type="text" class="form-control" id="inputtext4" value="<?php echo $row_details['family']?>" name="family" >
            </div>
        
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="inputAddress">Followup</label>
                <input type="text" class="form-control"  name="followup" value="<?php echo $row_details['followup']?>" id="inputAddress">    
            </div>
            <div class="form-group col-md-3">
                <label for="inputState">Entry By</label>
                <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option></option>
                    <option></option>
                    <option></option>
                </select>
            </div>  
        </div>
        <div class="d-flex justify-content-center">
        <div style="text-align: center;">
            <button type="submit" name="update" value="UPDATE" class="mybtn" style="border-radius: 24px;">UPDATE </button>
        </div>
</div>
        
    </form>

    <?php
  

}
    ?>




    <!-- DateTime Picker JS -->
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
</body>
</html>