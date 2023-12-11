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

    $movieId = $conexao->lastInsertId();  // Obtém o ID do filme recém-inserido

    $communitySql = "INSERT INTO community_posts (username, movie_title, rating, notas, post_time) VALUES (:username, :movieName, :rating, :notes, NOW())";

    $communityStmt = $conexao->prepare($communitySql);
    $communityStmt->bindParam(':username', $username);
    $communityStmt->bindParam(':movieName', $movieName);
    $communityStmt->bindParam(':rating', $rating);
    $communityStmt->bindParam(':notes', $notes);
    
    try {
        $communityStmt->execute();
    } catch (PDOException $e) {
        echo "Erro ao adicionar post à comunidade: " . $e->getMessage();
    }
    
    if ($stmt->execute()) {
        header("location:adicionarfilme.php");
    } else {
        echo "Erro ao adicionar filme: " . $stmt->errorInfo()[2];
    }
}    
?>
