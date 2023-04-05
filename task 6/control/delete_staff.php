<?php 

require_once '../model/model.php';

if (deleteStaff($_GET['id'])) {
    header('Location: ../view/view_staff.php');
}

 ?>