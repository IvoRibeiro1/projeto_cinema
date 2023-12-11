<?php
require_once('connectdb.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
   
    $result = getUserByLogin($username, $password);

    if (!empty($result)) {
        $user = $result[0];
        $_SESSION['userId'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("location:index.php");
        exit();
    } else {
        header("location:faillogin.php");
        //echo "Login failed. Please check your username and password.";
    }
}
?>
