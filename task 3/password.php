<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
.error {color: #FF0000;}
</style>
</head>
<body>
<?php
  // define variables and set to empty values
   $cpasswordErr = $npasswordErr = $rpasswordErr = "" ;
   $cpassword =  $npassword = $rpassword =  "";

  if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
    if (empty($_POST["cpassword"])) 
    {
      $cpasswordErr = "Current Password is Required";
    } else {
      $cpassword = test_input($_POST["cpassword"]);
      if (strlen($cpassword) < 8) {
        $cpasswordErr = "Must contain more than 8 characters";
      }
    }

        if (empty($_POST["npassword"])) {
          $npasswordErr = "New Password is Required";
        } else {
          $npassword = test_input($_POST["npassword"]);
          if (strlen($npassword) < 8) {
            $npasswordErr = "Must contain 8 character";
          }
        }
    
        if (empty($_POST["rpassword"])) {
          $rpasswordErr = "Retype New Password is Required";
        } else {
          $rpassword = test_input($_POST["rpassword"]);
          if (strlen($rpassword) < 8) {
            $rpasswordErr = "Must contain 8 character";
          }
          if ($npassword != $rpassword) {
            $rpasswordErr = "Doesn't match";
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

<h2>CHANGE PASSWORD</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
 Current Password: <input type="password" name="cpassword" value="<?php echo $cpassword;?>">
  <span class="error"> <?php echo $cpasswordErr;?></span>
  <br><br>
  New Password: <input type="password" name="npassword" value="<?php echo $npassword;?>">
  <span class="error"> <?php echo $npasswordErr;?></span>
  <br><br>
  Retype New Password: <input type="password" name="rpassword" value="<?php echo $rpassword;?>">
  <span class="error"> <?php echo $rpasswordErr;?></span>
  <br><br>

  <hr width="100%" color="Black">
  <input type="submit" name="submit" value="Submit">
  </form>

<?php
echo "<h2>Your Input:</h2>";
echo $cpassword;
echo "<br>";
echo $npassword;
echo "<br>";
echo $rpassword;
echo "<br>";
?>

</body>
</html>