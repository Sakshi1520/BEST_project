	<?php
	$username="root"; //username for database
	$password="root"; //database password
	$hostname="localhost"; //hostname
	$dbname="bestnew"; //database name
	$teston = true;
	
							//localhost,root
	$conn = mysqli_connect($hostname,$username,$password)
		or die("error connecting to database"); //make connection
	//echo "Connected to MySQL<br>";
	mysqli_select_db($conn,$dbname) //select database
		or die("Could not select examples");
	//echo "Database selected<br>";
	// echo("connected");
?>