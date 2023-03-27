<?php 

require_once ('../model/model.php');

function fetchLocation($id){
	return showLocation($id);

}
        $staff = fetchLocation($_GET['id']);
        include "log_top.php";

        //$staff = fetchLocation($_GET['id']);

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

 <form action="../control/edit_location_control.php" method="POST" enctype="multipart/form-data">
  <label for="name">Name:</label><br>
  <input value="<?php echo $staff['name'] ?>" type="text" id="name" name="name"><br>
  <label for="type">Type:</label><br>
  <input value="<?php echo $staff['type'] ?>" type="text" id="type" name="type"><br>
  <label for="cost">cost:</label><br>
  <input value="<?php echo $staff['cost'] ?>" type="text" id="cost" name="cost"><br>
  <label for="slot">slot:</label><br>
  <input value="<?php echo $staff['slot'] ?>" type="text" id="slot" name="slot"><br>
  <!--
  <label for="salary">salary:</label><br>
  <input value="<?php echo $staff['salary'] ?>" type="number" id="salary" name="salary"><br>
  <label for="dob">dob:</label><br>
  <input value="<?php echo $staff['dob'] ?>" type="date" id="dob" name="dob"><br>
  <label for="image">image:</label><br>
  <input value="<?php //echo $staff['ppp'] ?>" type="text" id="ppp" name="ppp"><br>
  <input type="file" name="image"><br><br>-->
  <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
  <input type="submit" name = "updateStaff" value="Update">
  <input type="reset">
</form> 

</body>
</html>

