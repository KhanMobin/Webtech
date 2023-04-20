<!DOCTYPE html>
<html>
<head>
	<title></title>
    <style type="text/css">
               table, tr, td,th{
                    border: 1px solid black;
                    border-collapse: collapse;
               }
          </style>
</head>
<body>
    <?php 
        require_once ('../model/model.php');

        function fetchAllLocation(){
            return showAllLocation();
        
        }
        $staff = fetchAllLocation();
        include "log_top.php";

     ?>
   
   <table>
	<thead>
		<tr>
			<th>Name</th>
			<!--<th>Surname</th>-->
			<th>Type</th>
			<th>cost</th>
			<!--<th>Image</th>-->
			<!--<th>Action</th>-->
            <th>slot</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($staff as $i => $staff): ?>
			<tr>
				<!--<td><a href="showStudent.php?id=<?php //echo $staff['id'] ?>"><?php //echo $staff['name'] ?></a></td>-->
				<!--<td><?php //echo $staff['Surname'] ?></td>-->
                <td><?php echo $staff['name'] ?></td>
				<td><?php echo $staff['type'] ?></td>
				<td><?php echo $staff['cost'] ?></td>
                <td><?php echo $staff['slot'] ?></td>
                <!--<td><?php //echo $staff['image'] ?></td>
				<td><img width="100px" src="../staffuploads/<?php //echo $staff['image'] ?>" alt="<?php //echo $staff['name'] ?>"></td>-->
				<td><a href="edit_location.php?id=<?php echo $staff['id'] ?>">Edit</a>
                &nbsp
                <!--<a href="../control/delete_staff.php?id=<?php //echo $staff['id'] ?>" onclick="return confirm('Are you sure want to delete this ?')">Delete</a></td>-->
			</tr>
		<?php endforeach; ?>
		

	</tbody>
	

</table>

 <form action="../control/add_location_sql_c.php" method="POST" enctype="multipart/form-data">
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name"><br>
  <label for="type">type:</label><br>
  <input type="text" id="type" name="type"><br>
  <!--<label for="username">User Name:</lacost
  <input type="text" id="username" name="username"><br>-->
  <label for="cost">cost:</label><br>
  <input type="number" id="cost" name="cost"><br>
  <label for="slot">slot:</label><br>
  <input type="number" id="slot" name="slot"><br>
  <input type="submit" name = "createStudent" value="Create">
  <input type="reset"> 
  <a href="view_profile.php">Back</a>
</form> 
<?php include 'footer.php';?>
</body>
</html>

