<?php  
require_once '../control/showstaffinfo.php';

$staff = fetchAllStaff();


    include "log_top.php";



?>
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
		<?php foreach ($staff as $i => $staff): ?>
			<tr>
				<!--<td><a href="showStudent.php?id=<?php //echo $staff['id'] ?>"><?php //echo $staff['name'] ?></a></td>-->
				<!--<td><?php //echo $staff['Surname'] ?></td>-->
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
<a href="view_profile.php">Back</a>

<?php include 'footer.php';?>

</body>
</html>