<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $_SESSION['username'] = $username;
   
    $host = "localhost";
    $user = "root";
    $password_db = "";
    $database = "projeto_cinema";

   
    $conn = new mysqli($host, $user, $password_db, $database);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        header("location:index.php");

    } else {
        echo "Credenciais invalidas. Tente novamente.";
    }

   
    $conn->close();
}
?>
