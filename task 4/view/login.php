<!DOCTYPE html>
<html>
<head>
	<title>Log in Page/title>
	<style type="text/css">
		.red{
			color: red;
			font-family: Perpetua;
		}
	</style>
</head>
<body>
	<?php
	include 'top.php';
	include '../control/logincontrol.php';
	?>
	<fieldset>
		<form method="post" action="<?php echo ($_SERVER['PHP_SELF']);?>">
			<fieldset>
				<legend><h2>LOGIN</h2></legend>

				<?php
				if($matchError){
					?>
					<span style="color: red;"><?php echo $matchError?></span>	
					<?php
				}
				?>
				<table>
					<tr>
						<td><label>User Name: </label></td>
						<td><input type="text" name="user_name" value="<?php echo $userName;?>"></td>
						<td><span class="red"><?php echo $userName_Err?></span></td>
					</tr>

					<tr>
						<td><label>Password: </label></td>
						<td><input type="password" name="password" value="<?php echo $pass;?>"></td>
						<td><span class="red"><?php echo $pass_Err?></span></td>
					</tr>
				</table><br>
				<hr>
				<input type="checkbox" name="remember_me" value="remembered">Remember me<br><br>
				<input type="submit" name="submission" value="submit">
				<!--<a href="forgot.php">Forgot Password?</a>-->		
			</fieldset>
		</form>
	</fieldset>

	<?php include 'footer.php';?>

</body>
</html>