<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 
  <?php
  // define variables and set to empty values
   $nameErr = $passwordErr = $meErr = "" ;
   $name =  $password = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
    if (empty($_POST["name"])) 
    {
      $nameErr = "User Name is required";
    } else {
      $name = test_input($_POST["name"]);
      if (str_word_count($name) < 2) {
        $nameErr = "Must contain at least two characters";
      }
      if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        $nameErr = "Only letters and white space allowed";
      }
      
    }
        if (empty($_POST["password"])) {
          $passwordErr = "Password is required";
        } else {
          $password = test_input($_POST["password"]);
          if (strlen($password) < 8) {
            $passwordErr = "Must contain 8 character";
    }
  }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>LOGIN</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  User Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error"> <?php echo $nameErr;?></span>
  <br><br>
  Password: <input type="password" name="password" value="<?php echo $password;?>">
  <span class="error"> <?php echo $passwordErr;?></span>
  <br><br>
  <hr width="100%" color="Black">
  <input id="Remember Me" type="checkbox" name="remember Me">
	<label for="Remember">Remember Me</label>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
  <a href="">Forget Password?</a>

</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $password;
echo "<br>";
?>

</body>
</html>