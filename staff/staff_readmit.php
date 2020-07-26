<?php

include('../connect.php');
session_start();
  if(!isset($_SESSION['com_id'])){
    header('location: ../committee_login.html');
  }
  

?>