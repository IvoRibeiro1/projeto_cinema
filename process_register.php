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

    $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    
    if ($conn->query($query) === TRUE) {
        header("location:sucesso_register.php");
       
    } else {
        echo "Erro: " . $query . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
