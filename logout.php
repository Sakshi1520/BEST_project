<?php 
session_start();
include('connect.php');
session_destroy();
header('location:committee_login.html');
?>