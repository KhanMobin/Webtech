
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		table,td,th{
			border:1px solid black;
		}
	</style>
</head>
<body>

<?php 
    include "log_top.php";

?>

<table>
	<thead>
		<tr>
            <th>Name</th>
			<!--<th>Surname</th>-->
			<th>Username</th>
			<th>Password</th>
			<!--<th>Image</th>-->
			<!--<th>Action</th>-->
            <th>Gender</th>
            <th>Salary</th>
            <th>DOB</th>
            <th>PPP</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($allSearchedUsers as $i => $staff): ?>
			<tr>
				<!--<td><a href="../showStudent.php?id=<?php //echo $user['id'] ?>"><?php //echo $user['id'] ?></a></td>-->
				<!--<td><?php //echo $user['username'] ?></td>-->
				<!--<td><a href="../editStudent.php?id=<?php //echo $user['id'] ?>">Edit</a>&nbsp<a href="deleteStudent.php?id=<?php //echo $user['ID'] ?>">Delete</a></td>-->
                <td><?php echo $staff['name'] ?></td>
				<td><?php echo $staff['username'] ?></td>
				<td><?php echo $staff['password'] ?></td>
                <td><?php echo $staff['gender'] ?></td>
                <td><?php echo $staff['salary'] ?></td>
                <td><?php echo $staff['dob'] ?></td>
                <!--<td><?php echo $staff['image'] ?></td>-->
				<td><img width="100px" src="../staffuploads/<?php echo $staff['image'] ?>" alt="<?php echo $staff['name'] ?>"></td>
				<td><a href="edit_staff.php?id=<?php echo $staff['id'] ?>">Edit</a>
                &nbsp
                <a href="../control/delete_staff.php?id=<?php echo $staff['id'] ?>" onclick="return confirm('Are you sure want to delete this ?')">Delete</a></td>
            </tr>
		<?php endforeach; ?>
		

	</tbody>
	

</table>
<a href="../view/search_staff.php">Back</a>

<?php include 'footer.php';?>

</body>
</html>