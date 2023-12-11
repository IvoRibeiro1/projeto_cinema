<?php
require_once('connectdb.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $_SESSION['username'] = $username;

    $conexao = estabelerConexao();

    // Assuming $conexao is your database connection
    $conn = $conexao;

    try {
        // Check if the connection is successful before executing the query
        if (!$conn) {
            die("Connection failed: " . $conn->errorInfo());
        }

        // Hash the password before storing it in the database
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $passwordHash);

        // Execute the prepared statement
        if ($stmt->execute()) {
            header("location: sucesso_register.php");
            exit(); // Add exit to stop further execution
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    } finally {
        // Close the connection in the finally block
        $conn = null;
    }
}
?>
