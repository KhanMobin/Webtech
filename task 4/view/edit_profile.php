<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php include 'log_top.php';?>
	<?php include '../control/edit_profile_control.php';?>
	
	<fieldset>
		<table border="1" width="100%">
			<tr>
				<td width="25%">
					Account<hr><br>
					<ul style="list-style-type:disc;">
					<li><a href="view_profile.php">View Profile</a></li>
								<li><a href="edit_profile.php">Edit Profile</a></li>
								<li><a href="change_pp.php">Change Profile Picture</a></li>
								<li><a href="change_pass.php">Change Password</a></li>
						<form method="POST" action="logout.php">
							<li><button type="submit" name="logout_btn">Log out</button></li>
						</form>
						
					</ul>
				</td>
				<td width="75%">
					<fieldset>
						<legend>EDIT PROFILE</legend>
						<form method="post" action="<?php echo ($_SERVER['PHP_SELF']);?>">
								
								<legend>Name</legend>
								<input type="text" name="fname" value="<?= $_SESSION['user']['name']?>"><span style="color: red;"><?php echo $nameErr ?></span>
								<hr>
							

								<!--
								<legend>Email</legend>
								<input type="text" name="email" value="<?php //$_SESSION['user']['email']?>"><span style="color: red;"><?php //echo $emailErr ?></span>
								<hr>-->
							

							
								<legend>Gender</legend>
								<input type="radio" name="gender" value="male" id="male" <?= ($_SESSION['user']['gender'] == 'male')? "checked":"" ?>>Male
								<input type="radio" name="gender" value="female" id="female" <?= ($_SESSION['user']['gender'] == 'female')? "checked":"" ?>>Female
								<input type="radio" name="gender" value="others" id="others" <?= ($_SESSION['user']['gender'] == 'others')? "checked":"" ?>>Others
								<br><span style="color: red;"><?php echo $genderErr ?></span>
								<hr>
						
							
								<legend>Date of birth</legend><br>
								<input type="date" name="dob" value="<?= $_SESSION['user']['dob']?>">
								<br>
								<span style="color: red;"><?php echo $dobErr ?></span><br>
								<hr>
							

								<input type="submit" name="submit" value="Submit">

						</fieldset>
					</td>
				</tr>
			</table>
		</fieldset>

		<?php include 'footer.php';?>
	</body>
	</html>