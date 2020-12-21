<?php

$servername = "localhost";
$username = "root";
$password = "nopass";
$dbname = "user_login";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql_qry = "INSERT INTO users SET username='$username', email='$email', password='$password', created_at=now()";

$result = $conn->query($sql_qry);

$response = array();
if ($result > 0) {
    $response = [
        "msg" => "Your registration is success.", "status" => 1
    ];
} else {
    $response = [
        "msg" => "failed", "status" => 0
    ];
}
$conn->close();

echo json_encode($response);