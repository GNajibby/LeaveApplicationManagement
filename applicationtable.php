<html>

<head>
	<link rel="stylesheet" href="apptable.css">
</head>

<body>

	<div class="topnav">
		<a class="active" href="ManagerMenu.html"><img src="LOGO.jpg"></a>
	</div>

	<div class="sidenav">
		<a href="applicationtable.php">View Unnaproved Applications</a>
		<a href="approvedtable.php">View All Applications</a>
		<a href="menu.html">Log Out</a>
	</div>

	<table id="application" align="center">

		<tr>
			<th>NRIC</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Start Date</th>
			<th>End Date</th>
			<th>No of Days</th>
			<th>Department</th>
			<th>Leave type</th>
			<th>Reason</th>
			<th>Status</th>
			<th>Action</th>
		</tr>


<?php

$con = mysqli_connect("localhost","root","");
if (!$con)
{
die('ERROR: Could not connect: ' . mysqli_error());
}

mysqli_select_db($con, "leavemanagement");

$record = mysqli_query($con, "SELECT * FROM leaveform WHERE approval = 'Unapproved'");

	while($row = mysqli_fetch_array($record))
		{
		$nric = $row['nric'];
		$F_name= $row['F_name'];
		$L_name = $row['L_name'];
		$email = $row['email'];
		$s_date = $row['s_date'];
		$e_date = $row['e_date'];
		$numdays = $row['numdays'];
		$department = $row['department'];
		$leavetype = $row['leavetype'];
		$reason = $row['reason'];
		$approval = $row['Approval'];
		
		
		print "<tr>";
		print "<td>".$nric."</td>";
		print "<td>".$F_name."</td>";
		print "<td>".$L_name."</td>";
		print "<td>".$email."</td>";
		print "<td>".$s_date."</td>";
		print "<td>".$e_date."</td>";
		print "<td>".$numdays."</td>";
		print "<td>".$department."</td>";
		print "<td>".$leavetype."</td>";
		print "<td>".$reason."</td>";
		print "<td >".$approval."</td>";
		
				echo '<form action="approve.php" method="post">';
				echo '<input type="hidden" name="id" value="'.$row["nric"].'">';
				echo '<td class="action" id="disappears" style="text-align: center;">
				<input class="button appbutton" type="submit" name="status" value="Approve"></input><input class="button rejbutton" type="submit" name="status" value="Reject"></input></td>';
				echo "</form>";
		
		
		print "</tr>";
 
 }
		
	mysqli_close($con);		
	
?>
</table>
</script>
</body>
</html>