<?php 

	$name = $email = $dob = $gender = "";
	$nameErr = $emailErr = $dobErr= $genderErr = "" ;

	if($_SERVER["REQUEST_METHOD"] == "POST"){

		$errorFlag = false;

		
		if(!isset($_POST['fname']) || empty($_POST['fname'])){
			$nameErr = "Name is required";
			$errorFlag = true;
		}else{
			$name = $_POST['fname'];
			if(!preg_match("/^[a-zA-Z-' ]*$/", $name)){
				$nameErr = "Only letters, whitespaces, - and ' are acceptable";
				$errorFlag = true;
			}
			else if(str_word_count($name)<2){
				$nameErr = "Name has to contain at least two words ";
				$errorFlag = true;
			}
		}
		/*
		if(empty($_POST['email'])){
			$emailErr = "Email is required";
			$errorFlag = true;
		}else{
			$email = $_POST['email'];
			$email_pattern = "/@gmail.com/i";
			$email_matching_result = preg_match($email_pattern, $email);
			if($email_matching_result == 0){
				$emailErr = "Email format is not valid";
				$errorFlag = true;
			}
		}
		*/
		if(empty($_POST['dob'])){
			$dobErr = "Day field is required";
			$errorFlag = true;
		}
		else{
			$dob = $_POST['dob'];
		}
		
		if(!isset($_POST['gender']) || empty($_POST['gender'])){
			$genderErr = "Gender field is required";
			$errorFlag = true;
		}else{
			$gender = $_POST['gender'];
		}

		if (!$errorFlag) {
			$users = json_decode(file_get_contents('../model/users.json'),true);

			foreach ($users as $key => $value) {
				if ($value['username'] ==  $_SESSION['user']['username']){

					$set = [
						'name' => $name,
						'email' => $_SESSION['user']['email'],
						'username' => $_SESSION['user']['username'],
						'password' => $_SESSION['user']['password'],
						'gender' => $gender,
						'dob' => $dob,
						'profilePicPath' => $_SESSION['user']['profilePicPath']
					];
					$_SESSION['user'] = $set;
					if(isset($_COOKIE['user'])){
						setrawcookie('user', base64_encode(json_encode($_SESSION['user'])));
					}
					$users[$key] = $_SESSION['user'];
					file_put_contents('../model/users.json', json_encode($users));

					header('Location: view_profile.php');
					break;
				}
			}
		}
	}
	?>