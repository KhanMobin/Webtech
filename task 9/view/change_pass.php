<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.red{
			color: red;
			font-family: Perpetua;
		}
	</style>
</head>
<body>
<?php include 'log_top.php';
	include '../control/change_pass_control.php';
?>

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
						<form method="POST" action="logout.php">
							<li><button type="submit" name="logout_btn">Log out</button></li>
						</form>
						
					</ul>
				</td>
				<td width="75%">
					<form method="post" action="<?php echo ($_SERVER['PHP_SELF']);?>">
						<fieldset>
							<legend>CHANGE PASSWORD</legend>
							<table>
								<tr>
									<td>Current Password</td>
									<td>:</td>
									<td><input type="text" name="curr_pass" value="<?php echo $curr_pass; ?>"></td>
									<td><span class="red"><?php echo $curr_pass_Err; ?></span></td>
									<td></td>
								</tr>

								<tr>
									<td>New Password</td>
									<td>:</td>
									<td><input type="text" name="new_pass" value="<?php echo $new_pass; ?>"></td>
									<td><span class="red"><?php echo $new_pass_Err; ?></span></td>
									<td><?php echo $same_prev_pass_Err; ?></td>

								</tr>

								<tr>
									<td>Confirm Password</td>
									<td>:</td>
									<td><input type="text" name="re_new_pass" value="<?php echo $re_new_pass; ?>"></td>
									<td><span class="red"><?php echo $re_new_pass_Err; ?></span></td>
									<td><span class="red"><?php echo $pass_mismatch_Err; ?></span></td>
								</tr>
							</table>
							<br>
							<hr>
							<input type="submit" name="submit">
						</fieldset>
					</form>

					<?php include 'footer.php';?>
				</body>
				</html>