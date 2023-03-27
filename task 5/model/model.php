<?php 

require_once 'connect.php';


function showAllStaff(){
	$conn = db_conn();
    $selectQuery = 'SELECT * FROM `staff` ';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function showStaff($id){
	$conn = db_conn();
	$selectQuery = "SELECT * FROM `staff` where id = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function searchUser($user_name){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `staff` WHERE username LIKE '%$user_name%'";

    
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


function addStaff($data){
	$conn = db_conn();
    $selectQuery = "INSERT into staff (name, username, password, gender, salary, dob, image)
VALUES (:name, :username, :password, :gender, :salary, :dob, :image)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	':name' => $data['name'],
        	//':surname' => $data['surname'],
        	':username' => $data['username'],
        	':password' => $data['password'],
        	//':image' => $data['image']
            ':gender' => $data['gender'],
            ':salary' => $data['salary'],
            ':dob' => $data['dob'],
            ':image' => $data['image']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}


function updateStaff($id, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE staff set name = ?, username = ?, password = ?, gender = ?, salary = ?, dob = ?, image = ? where id = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	$data['name'], $data['username'], $data['password'], $data['gender'], $data['salary'], $data['dob'], $data['image'], $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function deleteStaff($id){
	$conn = db_conn();
    $selectQuery = "DELETE FROM `staff` WHERE `id` = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}

function addLocation($data){
	$conn = db_conn();
    $selectQuery = "INSERT into location (name, type, cost, slot)
VALUES (:name, :type, :cost, :slot)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	':name' => $data['name'],
        	//':surname' => $data['surname'],
        	':type' => $data['type'],
        	':cost' => $data['cost'],
        	//':image' => $data['image']
            ':slot' => $data['slot']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function showAllLocation(){
	$conn = db_conn();
    $selectQuery = 'SELECT * FROM `location` ';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function showLocation($id){
	$conn = db_conn();
	$selectQuery = "SELECT * FROM `location` where id = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function updateLocation($id, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE location set name = ?, type = ?, cost = ?, slot = ? where id = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	$data['name'], $data['type'], $data['cost'], $data['slot'], $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}