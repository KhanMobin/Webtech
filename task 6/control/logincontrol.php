<?php
		$userName = $pass = "";
		$userName_Err = $pass_Err = "";
		$matchError = false;

		$errorFlag = false;

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
				
			if (!isset($_POST['name']) || empty($_POST['name'])) {
				$userName_Err = "User Name is required";
				$errorFlag = true; 
			}else{
				$userName = $_POST['name'];
			}
				
			if (!isset($_POST['password']) || empty($_POST['password'])) {
				$pass_Err = "Password is required";
				$errorFlag = true;
			}else{
				$pass = $_POST['password'];
			}

			if(!$errorFlag){
				$users = json_decode(file_get_contents('../model/users.json'), true);

				if(is_array($users)){
					$matchError = "User not found";
					foreach ($users as /*$key =>*/ $value) {
						if($value['username'] == $_POST['user_name']){
							if ($_POST['password'] == $value['password']){
								$_SESSION['user'] = $value;
								if(isset($_POST['remember_me']) && $_POST['remember_me'] == 'remembered'){
									setrawcookie('user', base64_encode(json_encode($value)));
								}
								header("Location: view_profile.php");
							}else{
								$matchError = "Password does not match";
								break;
							}
						}

					}
			

				}else{
					$matchError = "No users found";

				}
			}
			

		}

		?>