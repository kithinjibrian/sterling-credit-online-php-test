<?php
/**
 * Database created by running
 * CREATE TABLE Users (
 * id int NOT NULL AUTO_INCREMENT,
 * username varchar(255) NOT NULL,
 * email varchar(255) NOT NULL,
 * password varchar(255) NOT NULL,
 * PRIMARY KEY (id)
 * );
 * in mysql terminal
 */
$servername = "localhost";
$username = "kithinji";
$password = "topsecret";
$dbname = "sterling";
//connect database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['REQUEST_URI'];

switch($method) {
    case "GET":
        //expected url "http://localhost/sterling/Q1.php?user=1"
        //get id from query string ie restful_q1.php?user=1
        $id = $_GET['user'];
        //using prepared statements to avoid sql injection
        $stmnt = $conn->prepare("SELECT * FROM Users WHERE id=?");
        $stmnt->bind_param('i',$id);
        $stmnt->execute();
        $result = $stmnt->get_result();
        $user = $result->fetch_assoc();
        echo json_encode($user);
    break;
    case "POST":
        $data = json_decode(file_get_contents('php://input'), true);
        $username = $data['username'];
        $email = $data['email'];
        $password = $data['password'];
        $datetime = date_create()->format('Y-m-d H:i:s');
        $stmnt = $conn->prepare("INSERT INTO Users (username, email, password, created_at) VALUES (?, ?, ?, ?)");
        $stmnt->bind_param('ssss',$username,$email,$password, $datetime);
        $stmnt->execute();
        echo "user saved successfully";
    break;
    case "PUT":
        $id = $_GET['user'];
        $data = json_decode(file_get_contents('php://input'), true);
        $username = $data['username'];
        $email = $data['email'];
        $password = $data['password'];
        $stmnt = $conn->prepare("UPDATE Users SET username=?, email=?, password=? WHERE id=?");
        $stmnt->bind_param('sssi',$username,$email,$password,$id);
        $stmnt->execute();
        echo "user patched successfully";
    break;
    case "DELETE":
        $id = $_GET['user'];
        $stmnt = $conn->prepare("DELETE FROM Users WHERE id=?");
        $stmnt->bind_param('i',$id);
        $stmnt->execute();
        echo "user deleted successfully";
    break;
}

$conn->close();
?>
