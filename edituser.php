<?php

$con = mysqli_connect("localhost","root","");
if (!$con)
{
die('ERROR: Could not connect: ' . mysqli_error());
}

mysqli_select_db($con, "leavemanagement");

$id = $_GET["myid"];

	echo "<h2> Update User Information </h2>";
	echo '<form action = "updateuser.php" method = "POST">';
	echo '<p> Username: <br><input type = "text" name = "u_name" value = "'.$id.'"]" /></p>';
	echo '<p> First Name: <br><input type = "text" name = "F_Name" /></p>';
	echo '<p> Last Name: <br><input type = "text" name = "L_Name" /></p>';
	echo '<p> Email Address: <br><input type = "text" name = "email" /></p>';
	echo '<p> NRIC: <br><input type = "text" name = "nric" /></p>';
	echo '<p> Password: <br><input type = "text" name = "password1" /></p>';
	echo '<p> Confirm Password: <br><input type = "text" name = "password2" /></p>';
	echo '<input type="submit" value = "update"/>';



?>