<?php
require_once('connectdb.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    // $_SESSION['username'] = $username;
   
    $result = getUserByLogin($username, $password)[0];

    if($result == true){
        $_SESSION['userId'] = $result['id'];
        $_SESSION['username'] = $result['username'];

        //header
    }

}


?>
