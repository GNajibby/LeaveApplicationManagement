<?php

	$con = mysqli_connect("localhost","root","");
	if (!$con)
	{
	die('ERROR: Could not connect: ' . mysqli_error());
	}

	mysqli_select_db($con, "leavemanagement");
	$sql="INSERT INTO leaveform(F_name, L_name, email, nric, s_date, e_date, numdays, department, leavetype, reason)
	VALUES (
	
			'$_POST[F_name]',
			'$_POST[L_name]',
			'$_POST[email]',
			'$_POST[nric]',
			'$_POST[s_date]',
			'$_POST[e_date]',
			'$_POST[numdays]',
			'$_POST[department]',
			'$_POST[leavetype]',
			'$_POST[reason]');";
	
	if (mysqli_query($con,$sql))
	{
		echo "Your leave application is submitted";
		header ('location:Form.html');
	}
	else {
		die('Error: applying leave form, please try again.' . mysqli_error());
	}
	mysqli_close($con)
?>