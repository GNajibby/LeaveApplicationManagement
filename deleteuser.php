<?php

$con = mysqli_connect("localhost","root","");
if (!$con)
{
die('ERROR: Could not connect: ' . mysqli_error());
}

mysqli_select_db($con, "leavemanagement");

$id = $_GET["myid"];
$delete = "DELETE FROM user
			WHERE username ='".$id."'";
		
		if(mysqli_query($con, $delete)){
			echo "User Data Deleted Successfully";
		   }
?>