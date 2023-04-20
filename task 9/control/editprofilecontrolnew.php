<?php  
require_once '../model/model.php';


if (isset($_POST['submit'])) {
	$data['name'] = $_POST['fname'];
    $_SESSION['name'] = $_POST['fname'];

	//$data['username'] = $_POST['username'];

    $data['gender'] = $_POST['gender'];
    $_SESSION['gender'] = $_POST['gender'];

    $data['dob'] = $_POST['dob'];
    $_SESSION['dob'] = $_POST['dob'];

	//$data['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT, ["cost" => 12]);
    //$data['salary'] = $_POST['salary'];
    //$data['ppp'] = $_POST['ppp'];
    /*
	$data['image'] = basename($_FILES["image"]["name"]);
    //$_SESSION['image'] = basename($_FILES["image"]["name"]);

	$target_dir = "../uploaded_folder";
	$target_file = $target_dir . basename($_FILES["image"]["name"]);
    */

  if (updateAdmin($data)) {
  	echo 'Successfully updated!!';
  	//redirect to showStudent
  	header('Location: ../view/edit_profile.php');
  }

else {
	echo 'You are not allowed to access this page.';
}

}



?>