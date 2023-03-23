<html>
    <head>
        <link rel="stylesheet" href="applicationhistory.css">
    </head>
    <body>
        <br>
	<div class="sidenav">
		<a href="StaffMenu.html">Dashboard</a>
		<a href="menu.html">Log Out</a>
		<button class="dropdown-btn">Leave
			<i class="fa fa-caret-down"></i>
		</button>
		<div class="dropdown-container">
			<a href="Form.html">Apply Leave</a>
			<a href="applicationhistory.php">Application History</a>
		</div>
		<a href="">Visit Us</a>
	</div>

	</div>
	<div class="main">
		<div class="top">
			<h2>Application History</h2>
		</div>
		<br><br>
		<div id="box">
			<h2 class="title">All My Application</h2><br><br>
			<table class="history" style="width:100%">
                <tr>
                    <th>LEAVE TYPE</th>
                    <th>START DATE</th>
                    <th>END DATE</th>
                    <th>NO. OF DAYS</th>
                    <th>MANAGER STATUS</th>
                </tr>
<?php

$con = mysqli_connect("localhost","root","");
if (!$con)
{
die('ERROR: Could not connect: ' . mysqli_error());
}

mysqli_select_db($con, "leavemanagement");

session_start();

$username = $_SESSION["username"];
$user = mysqli_query($con, "SELECT * FROM user WHERE username LIKE '%$username%'");
$index_user = mysqli_fetch_array($user);
$nric_user = $index_user["nric"];


$record = mysqli_query($con, "SELECT * FROM leaveform WHERE nric LIKE '%$nric_user%'");

	while($row = mysqli_fetch_array($record))
		{
		$leavetype = $row['leavetype'];
		$s_date = $row['s_date'];
		$e_date = $row['e_date'];
		$numdays = $row['numdays'];
		$approval = $row['Approval'];
		
		
		print "<tr>";
		print "<td>".$leavetype."</td>";
		print "<td>".$s_date."</td>";
		print "<td>".$e_date."</td>";
		print "<td>".$numdays."</td>";
		print "<td >".$approval."</td>";
		
		print "</tr>";
		print "</table'>";
 }
 
		
	mysqli_close($con);		
	
?>
            </table>

		</div>
	</div>
	<script type="text/javascript">
		var dropdown = document.getElementsByClassName("dropdown-btn");
		var i;

		for (i = 0; i < dropdown.length; i++) {
			dropdown[i].addEventListener("click", function () {
				this.classList.toggle("active");
				var dropdownContent = this.nextElementSibling;
				if (dropdownContent.style.display === "block") {
					dropdownContent.style.display = "none";
				} else {
					dropdownContent.style.display = "block";
				}
			});
		}
	</script>
	<div class="topnav">
		<a class="active" href="StaffMenu.html"><img src="LOGO.jpg"></a>
	</div>
    </body>
</html>