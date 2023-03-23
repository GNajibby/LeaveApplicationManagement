<?php

$con = mysqli_connect("localhost","root","");
if (!$con)
{
die('ERROR: Could not connect: ' . mysqli_error());
}

mysqli_select_db($con, "leavemanagement");

$update = "UPDATE user
		SET F_Name='".$_POST['F_Name']."', 
		L_Name='".$_POST['L_Name']."',
		email='".$_POST['email']."',
		nric ='".$_POST['nric']."', 
		password1 ='".$_POST['password1']."',
		password2 ='".$_POST['password2']."'
		
		WHERE username ='".$_POST['u_name']."'";
			
				if(mysqli_query($con, $update)){
					echo "User Data Updated Successfully";
				}

?>
