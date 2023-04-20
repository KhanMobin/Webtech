<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        require_once "../model/model.php";

        $data["name"]       = $_POST["name"];
        $data["password"]   = $_POST["password"];

        login_user($data);
            
        if (login_user($data) == true) {
            session_start();
            $_SESSION['login_status'] = true;
            $_SESSION['name'] = $_POST['name'];

            $admininfo = showAdminfetch();
            $_SESSION['gender'] = $admininfo['gender'];
            $_SESSION['dob'] = $admininfo['dob'];
            $_SESSION['image'] = $admininfo['image'];
            header("Location: view_profile.php");
        }
        else {
            echo "Credentials do not match";
        }
    }
?>