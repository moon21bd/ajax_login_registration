<?php
session_start();

if ($_SESSION['user_info']['is_login']) {

    $username = $_SESSION['user_info']['username'];
    $email = $_SESSION['user_info']['email'];
    $registered_on = $_SESSION['user_info']['registered_on'];

    echo "Hello <b>$username</b> You've successfully logged In. Your email address is <b>$email</b> <br><br>";
    echo "If you need logout the session <a href='logout.php'>click here</a>";

} else {
    header('Location: index.html');
    exit();
}
