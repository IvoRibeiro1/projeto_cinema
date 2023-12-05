<?php
require_once('connectdb.php');
session_start();    

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
   
} 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST["category"];
    $movieName = $_POST["movieName"];
    $rating = $_POST["rating"];
    $notes = $_POST["notes"];
    $userId = $_SESSION['userId'];

    $categoryId = getCategoryIdByName($category);

    $insertQuery = "INSERT INTO filmes (nomefilme, rating, notas, id_user, id_categorias) VALUES (:movieName, :rating, :notes, :userId, :categoryId)";
    
    $conexao = estabelerConexao();

    $stmt = $conexao->prepare($insertQuery);

    $stmt->bindParam(':movieName', $movieName);
    $stmt->bindParam(':rating', $rating);
    $stmt->bindParam(':notes', $notes);
    $stmt->bindParam(':userId', $userId);
    $stmt->bindParam(':categoryId', $categoryId);


    if ($stmt->execute()) {
        echo "Filme adicionado com sucesso!";
    } else {
        echo "Erro ao adicionar filme: " . $stmt->errorInfo()[2];
    }
}
?>
