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
$password = $_POST['password'];

$sql_qry = "SELECT * FROM users WHERE (username='$username' OR email='$username') AND password='$password'";

$result = $conn->query($sql_qry);

$response = array();
if ($result->num_rows > 0) {

    while ($obj = $result->fetch_object()) {
        $id = $obj->id;
        $username = $obj->username;
        $email = $obj->email;
        $password = $obj->password;
        $created_at = $obj->created_at;
    }
    session_start();
    $_SESSION['user_info'] = $login_data = [
        'id' => $id,
        'username' => $username,
        'email' => $email,
        'password' => $password,
        'registered_on' => $created_at,
        'is_login' => true,
    ];

    $response = [
        "msg" => "Login Successful.",
        "status" => 1,
        "data" => $login_data
    ];

} else {
    $response = [
        "msg" => "Username or Password is not correct. Please type again.", "status" => 0
    ];
}
$conn->close();

echo json_encode($response);