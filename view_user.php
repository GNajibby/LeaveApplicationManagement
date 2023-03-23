<?php

$con = mysqli_connect("localhost","root","");
if (!$con)
{
die('ERROR: Could not connect: ' . mysqli_error());
}

mysqli_select_db($con, "leavemanagement");
	
$search = $_POST['username'];
$result = mysqli_query($con, "SELECT * FROM user WHERE username = '$search'");
		
		
		while($row = mysqli_fetch_array($result))
		{
				echo "First Name : ". $row ["F_name"];
				echo "<br>";
				echo "Last Name : ". $row ["L_name"];
				echo "<br>";
				echo "Email Address : ". $row ["email"];
				echo "<br>";
				echo "NRIC : ". $row ["nric"];
				echo "<br>";
				echo "Password : ". $row ["password1"];
				echo "<br>";
				echo "<br>";
				echo "<br>";
				
				$id = $row["username"];
				
				echo "<a href='edituser.php?myid=".$id."'>Update Record</a><br>";
				echo "<a href='deleteuser.php?myid=".$id."'>Delete Record</a><br>";
		}
mysqli_close($con);		

?>