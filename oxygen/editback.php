
<?php
session_start();
include '../connect.php';
$regis_no=$_SESSION['regis_no'];
if(@isset($_POST['update']))
    {
        $name=$_POST['name'];
        $age=$_POST['age'];
        $sex=$_POST['sex'];
        $cheque_no=$_POST['cheque_no'];
        $mobile_no=$_POST['mobile_no'];
        $designation=$_POST['designation'];
        $department=$_POST['department'];
        $depot=$_POST['depot'];
        $addictions=$_POST['addictions'];
        $address=$_POST['address'];
        $comorbidity=$_POST['comorbidity'];
        $last_working=$_POST['last_working'];
        $travel_history=$_POST['travel_history'];
        $exposure=$_POST['exposure'];
        $symptoms=$_POST['symptoms'];
        $testing_date=$_POST['testing_date'];
        $hospital=$_POST['hospital'];
        $admission_date=$_POST['admission_date'];
        $oxygen=$_POST['oxygen'];
        $discharge=$_POST['discharge'];
        $dis_date=$_POST['dis_date'];
        $dis_no=$_POST['dis_no'];
        $family=$_POST['family'];
        $followup=$_POST['followup'];


        $query_edit = "UPDATE `staff_details` SET `name`='$name', `age`='$age', `sex`='$sex', `cheque_no`='$cheque_no', `mobile_no`='$mobile_no', `designation`='$designation', `department`='$department', `depot`='$depot', `addictions`='$addictions', `address`='$address', `comorbidity`='$comorbidity', `last_working`='$last_working', `travel_history`='$travel_history', `exposure`='$exposure', `symptoms`='$symptoms', `testing_date`='$testing_date', `hospital`='$hospital', `admission_date`='$admission_date', `oxygen`='$oxygen', `discharge`='$discharge', `dis_date`='$dis_date', `dis_no`='$dis_no', `family`='$family', `followup`='$followup'  WHERE `regis_no` = '$regis_no'";
        $result = mysqli_query($conn,$query_edit);
       
        if($result)
        {
            echo "<script>alert('UPDATE SUCCESSFUL.')</script>";
            header('refresh:0,url=oxygenguy.php');
        }
        else
        {
            echo "<script>alert('UPDATE UNSUCCESSFUL Please Try Again')</script>";
        }
    }

    ?>