<?php

	$con = mysqli_connect("localhost","root","");
	if (!$con)
	{
	die('ERROR: Could not connect: ' . mysqli_error());
	}

	mysqli_select_db($con, "leavemanagement");
	$sql="INSERT INTO user(F_name, L_name, email, nric, username, password1, password2)
	VALUES (
	
			'$_POST[F_name]',
			'$_POST[L_name]',
			'$_POST[email]',
			'$_POST[nric]',
			'$_POST[username]',
			'$_POST[password1]',
			'$_POST[password2]');";
	
	if (mysqli_query($con,$sql))
	{
		echo "User data is saved";
		header ('location:registeruser.html');
	}
	else {
		die('Error: ' . mysqli_error());
	}
	mysqli_close($con)
?>