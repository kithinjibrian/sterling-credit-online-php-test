<?php
/**
 * Database created by running
 * CREATE TABLE Users (
 * id int NOT NULL AUTO_INCREMENT,
 * username varchar(255) NOT NULL,
 * email varchar(255) NOT NULL,
 * password varchar(255) NOT NULL,
 * created_at DATETIME,
 * PRIMARY KEY (id)
 * );
 * in mysql terminal
 */
$servername = "localhost";
$username = "kithinji";
$password = "topsecret";
$dbname = "sterling";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$stmnt = $conn->prepare("SELECT * FROM Users");
$stmnt->execute();
$result = $stmnt->get_result();
$data = array();
/**
 * build output
 * as expected
 * [
 * {
 *  "username":"kithinji",
 *  "email":"kithinjibrian369@gmail.com"
 * }
 * ]
 */
while($row = $result->fetch_assoc()) {
    $a = array("username" => $row['username']);
    $b = array("email" => $row['email']);
    array_push($data,$a + $b);
}
echo json_encode($data);

$conn->close();
?>
