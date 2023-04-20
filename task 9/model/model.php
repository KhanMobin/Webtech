<?php 

require_once 'connect.php';

function login_user($data) {
    /*
    $conn = connect_function();
    $sql = "SELECT * FROM user_data WHERE name = :name AND password = :password";
    try {
        $statement = $conn->prepare($sql);
        $statement->execute(
            [
                ':name' => $data['name'],
                ':password' => $data['password']
            ]
        );
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }

    echo "<table style='border: solid 1px black;'>";
    echo "<tr><th>Serial</th><th>Name</th><th>Email</th><th>Password</th></tr>";
    
    class TableRows extends RecursiveIteratorIterator {
        function __construct($it) {
            parent::__construct($it, self::LEAVES_ONLY);
        }
        
        function current() {
            return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
        }
        
        function beginChildren() {
            echo "<tr>";
        }
        
        function endChildren() {
            echo "</tr>" . "\n";
        }
    }
    
    
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "myDB";
    */
    
    $conn = db_conn();
    $selectQuery = "SELECT * FROM admin WHERE name = :name AND password = :password";

    try {
        /*
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM user_data WHERE lastname=");
        $stmt->execute();
        */
        
        $statement = $conn->prepare($selectQuery);
        $statement->execute(
            [
                ':name' => $data['name'],
                ':password' => $data['password']
            ]
        );

        // set the resulting array to associative
        /*
        $result = $statement->setFetchMode(PDO::FETCH_ASSOC);
        $fetched = $statement->fetchAll();

        foreach(new TableRows(new RecursiveArrayIterator($fetched)) as $k=>$v) {
            echo $v;
        }
        */
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    if (empty(($result))) {
        return false;
    }
    else {
        return true;
    }
    
    //echo "</table>";
}

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

function showAdminfetch(){
	$conn = db_conn();
	$selectQuery = "SELECT * FROM `admin` where id = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([1]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function updateAdmin($data){
    $conn = db_conn();
    $selectQuery = "UPDATE admin set name = ?, gender = ?, dob = ? where id = 1";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	$data['name'], $data['gender'], $data['dob']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}

function updateAdminPass($data){
    $conn = db_conn();
    $selectQuery = "UPDATE admin set password = ? where id = 1";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	$data['password']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}

function updatePicture($data) {
    $conn = db_conn();
    $selectQuery = "UPDATE admin set image = ? where id = 1";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	$data['image']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}

function ajax_query($segment) {

    $conn = db_conn();
    if (!empty($segment)) {
        //$sql = "SELECT name, donation_amount, country FROM fund_data WHERE name LIKE '%$segment%'";
        $sql = "SELECT name, username, gender, salary, dob, image FROM staff WHERE name LIKE '%$segment%'";
    }
    else {
        //$sql = "SELECT name, donation_amount, country FROM fund_data";
        $sql = "SELECT name, username, gender, salary, dob, image FROM staff";
    }
    try {
        $statement = $conn->query($sql);
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    /*
    echo "<table class='table table-bordered'><tr><th scope='col'>Name</th><th scope='col'>Donation</th><th scope='col'>Country</th></tr>";
    foreach($result as $i => $row) {
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . "$" . $row['donation_amount'] . "</td>";
    echo "<td>" . $row['country'] . "</td>";
    echo "</tr>";
    }
    echo "</table>";
    */

    echo "<table><tr><th>Name</th><th>Username</th><th>Gender</th><th>Salary</th><th>DOB</th><th>Image</th></tr>";
    foreach($result as $i => $row) {
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['gender'] . "</td>";
    echo "<td>" . $row['salary'] . "</td>";
    echo "<td>" . $row['dob'] . "</td>";
    echo "<td>" . $row['image'] . "</td>";
    echo "</tr>";
    }
    echo "</table>";
}