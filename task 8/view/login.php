<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
<script>
function validateForm() {
  let validity = true;
  let x = document.forms["myForm"]["name"].value;
  let y = document.forms["myForm"]["password"].value;
  if (x == "") {
    //alert("Name must be filled out");
    document.getElementById("nameErr").innerHTML = "*Username can't be empty";
    validity = false;
    //return false;
  }
  else {
    document.getElementById("nameErr").innerHTML = "";
  }
  if (y == "") {
    //alert("Name must be filled out");
    document.getElementById("passErr").innerHTML = "*Password can't be empty";
    validity = false;
    //return false;
  }
  else {
    document.getElementById("passErr").innerHTML = "";
  }
  return validity;
}

function check_name_field(str) {
        if (str.length == 0) {
          document.getElementById("nameErr").innerHTML = "*Name field can't be empty";
          return;
        }
        else {
          document.getElementById("nameErr").innerHTML = "";
          return;
        }
      }

      function check_pass_field(str) {
        if (str.length == 0) {
          document.getElementById("passErr").innerHTML = "*Password field can't be empty";
          return;
        }
        else {
          document.getElementById("passErr").innerHTML = "";
          return;
        }
      }
</script>
</head>
<body>
<?php
include "top.php";
include '../control/logincontrolnew.php';
?>
<h2>Login</h2>

<form name="myForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm()" method="post">
  Name: <input type="text" name="name" onkeyup="check_name_field(this.value)">
  <span style="color: red;" id="nameErr"></span><br><br>
  Password: <input type="password" name="password" onkeyup="check_pass_field(this.value)">
  <span style="color: red;" id="passErr"></span><br><br>
  <input type="checkbox" name="remember_me" value="remembered">Remember me<br><br>
  <input type="submit" value="Submit">
</form>
<?php include "footer.php"; ?>
</body>
</html>