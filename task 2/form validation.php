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
  $dobErr = $bloodErr = $degreeErr = $nameErr = $emailErr = $genderErr = "" ;
  $date = $month = $year = $blood = $degree = $name = $email = $gender = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
    } else {
      $name = test_input($_POST["name"]);
      if (str_word_count($name) < 2) {
        $nameErr = "Must contain two or more words";
      }
      if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        $nameErr = "Only letters and white space allowed";
      }
      
    }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["date"]) || empty($_POST["month"]) || empty($_POST["year"])) {
    $dobErr = "Date of birth is required";
  } else {
    $date = test_input($_POST["date"]);
    $month = test_input($_POST["month"]);
    $year = test_input($_POST["year"]);
    // check if date is valid
    if ($date < 1 || $date > 31 || $month < 1 || $month > 12 || $year < 1953 ||  $year > 1998) {
      $dobErr = "Invalid date of birth";
    }
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

  if (empty($_POST["degree"])) {
    $degreeErr = "Degree is required";
  } else {
    $degree = $_POST["degree"];
      if (count($_POST["degree"]) < 2) {
        $degreeErr = "Must select at least two";
      }
      
    }

  if (empty($_POST["blood"])) {
    $bloodErr = "Blood group is required";
  } else {
    $blood = $_POST["blood"];
  }
  }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error"> <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error"> <?php echo $emailErr;?></span>

  <br>
  <p>Date of birth:</p>
  <input type="number" name="date" placeholder="dd" style="width : 35px;" value="<?php echo $date;?>"> /
  <input type="number" name="month" placeholder="mm" style="width : 35px;" value="<?php echo $month;?>"> /
  <input type="number" name="year" placeholder="yyyy" style="width : 50px;" value="<?php echo $year;?>">
  <span class="error"> <?php echo $dobErr;?></span>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="Female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="Male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="Other">Other  
  <span class="error"> <?php echo $genderErr;?></span>
  <br><br>
  Degree:
  <input type="checkbox" name="degree[]" <?php if (isset($degree) && $degree=="ssc") echo "checked";?> value="ssc">SSC
  <input type="checkbox" name="degree[]" <?php if (isset($degree) && $degree=="hsc") echo "checked";?> value="hsc">HSC
  <input type="checkbox" name="degree[]" <?php if (isset($degree) && $degree=="bsc") echo "checked";?> value="bsc">B.Sc.
  <input type="checkbox" name="degree[]" <?php if (isset($degree) && $degree=="msc") echo "checked";?> value="msc">M.Sc.
  <span class="error"><?php echo $degreeErr;?></span>
  <br><br>

  Blood Group:
  <select name="blood" id="">
    <option value="">None</option>
    <option value="A Positive">A Positive</option>
    <option value="A Negative">A Negative</option>
    <option value="B Positive">B Positive</option>
    <option value="B Negative">B Negative</option>
    <option value="AB Positive">AB Positive</option>
    <option value="AB Negative">AB Negative</option>
    <option value="O Positive">O Positive</option> 
    <option value="O Negative">O Negative</option>
  </select>
  <span class="error"><?php echo $bloodErr;?></span>

  <br><br>

  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo "Name:- ".$name;
echo "<br>";
echo "E-mail:- ".$email;
echo "<br>";
echo "Date: ".$date." Month: ".$month." Year: ".$year;
echo "<br>";
echo "Gender:- ".$gender;
echo "<br>";
echo "Degree:- ";
if (!empty($_POST["degree"])){
foreach($_POST['degree'] as $value)
{
  echo '<ul>';
  echo "<li>" .$value. "</li>";
  echo '</ul>';
}
}
echo "<br>";
echo "Blood Group:- ".$blood;
?>

</body>
</html>