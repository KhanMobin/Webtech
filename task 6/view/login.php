<!DOCTYPE html>
<html>
<head>
	<title>Log in Page/title>
	<!--
	<style type="text/css">
		.red{
			color: red;
			font-family: Perpetua;
		}
	</style>-->
	<script>  
		function validateform(){  
		var name=document.loginform.name.value;  
		var password=document.loginform.password.value;  
		  
		if (name==null || name==""){  
		  alert("Name can't be blank");  
		  return false;  
		}else if(password.length<6){  
		  alert("Password must be at least 6 characters long.");  
		  return false;  
		  }  
		}
		function checkName() {
			if (document.getElementById("name").value == "") {
			  	document.getElementById("nameErr").innerHTML = "Name can't be blank";
			  	document.getElementById("name").style.borderColor = "red";
			}else{
			  	document.getElementById("nameErr").innerHTML = "";
			  	document.getElementById("name").style.borderColor = "black";

			}
			
        }
        function checkPass(){
        	if (document.getElementById("password").value == "") {
			  	document.getElementById("passErr").innerHTML = "Password can't be blank";
			  	document.getElementById("password").style.borderColor = "red";
			}else{
				document.getElementById("passErr").innerHTML = "";
			  	document.getElementById("password").style.borderColor = "black";
			}
        }
</script>  
</head>
<body>
	<?php
	include 'top.php';
	include '../control/logincontrolnew.php';
	?>
	<fieldset>
		<form name="loginform" method="post" onsubmit="validateform()" action="<?php echo ($_SERVER['PHP_SELF']);?>">
			<fieldset>
				<legend><h2>LOGIN</h2></legend>

				<?php
				/*
				if($matchError){
					?>
					<span style="color: red;"><?php echo $matchError?></span>	
					<?php
				}*/
				?>
				<table>
					<tr>
						<td><label>User Name: </label></td>
						<td><input type="text" id="name" name="name" onblur="checkName()" onkeyup="checkName()"></td>
						<td><span id="nameErr"></span></td>
					</tr>

					<tr>
						<td><label>Password: </label></td>
						<td><input type="password" id="password" name="password" onblur="checkPass()"></td>
						<td><span id="passErr"></span></td>
					</tr>
				</table><br>
				<hr>
				<input type="checkbox" name="remember_me" value="remembered">Remember me<br><br>
				<input type="submit" name="submit" value="submit">
				<!--<a href="forgot.php">Forgot Password?</a>-->		
			</fieldset>
		</form>
	</fieldset>

	<?php include 'footer.php';?>

</body>
</html>