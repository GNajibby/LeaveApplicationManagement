<?php

$con = mysqli_connect("localhost","root","");
if (!$con)
{
die('ERROR: Could not connect: ' . mysqli_error());
}

mysqli_select_db($con, "leavemanagement");

$update = "UPDATE leaveform
    SET approval ='".$_POST['status']."'
    WHERE nric ='".$_POST['id']."'";
    
	if(mysqli_query($con,$update)){
        echo "Table Updated Successfully";
		header ('location:applicationtable.php');
    }
	else {
		echo "Error Updating Table";
	}
	
	mysqli_close($con)

?>