<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php include 'log_top.php';?>

	<fieldset>
		<table border="1" width="100%">
			<tr>
				<td width="25%">
					Account<hr><br>
					<ul style="list-style-type:disc;">
					<li><a href="welcome.php">Dashboard</a></li>
					<li><a href="view_profile.php">View Profile</a></li>
								<li><a href="edit_profile.php">Edit Profile</a></li>
								<li><a href="change_pp.php">Change Profile Picture</a></li>
								<li><a href="change_pass.php">Change Password</a></li>
								<li><a href="add_staff.php">Add Staff</a></li>
								<li><a href="view_staff.php">View Staff</a></li>
								<li><a href="search_staff.php">Search Staff</a></li>
								<!--<li><a href="staffsample.php">Edit Staff</a></li>-->
								<!--<li><a href="add_locations.php">Add Location</a></li>-->
								<li><a href="add_location_sql_v.php">Add Location</a></li>
						<form method="POST" action="logout.php">
							<li><button type="submit" name="logout_btn">Log out</button></li>
						</form>
						
					</ul>
				</td>
				<td width="75%">
					<fieldset>
						<legend>PROFILE</legend>
						<table width="100%">
							<tr>
								<td width="25%">Name</td>
								<td><span>:</span><?= $_SESSION['name']?></td>
								<!--<td rowspan="3" width="100%" align="center"><img src="<?php //$_SESSION['user']['profilePicPath'] ?>" height="200" width="200"></td>-->
								<td rowspan="3" width="100%" align="center"><img src="../uploaded_folder/<?php echo $_SESSION['image']; ?>" height="200" width="200"></td>
							</tr>
<!--
							<tr>
								<td width="25%">Email</td>
								<td><span>:</span><?php //$_SESSION['user']['email']?></td>
							</tr>
-->
							<tr>
								<td width="25%">Gender</td>
								<td><span>:</span><?= $_SESSION['gender']?></td>
							</tr>

							<tr>
								<td width="25%">Date of Birth</td>
								<td><span>:</span><?= $_SESSION['dob']?></td>
								<td align="center" width="100%"><a href="change_pp.php">Change</a></td>
							</tr>
						</table><hr>
						<a href="edit_profile.php">Edit Profile</a>
					</fieldset>
				</td>
			</tr>
		</table>
	</fieldset>

	<?php include 'footer.php';?>
</body>
</html>