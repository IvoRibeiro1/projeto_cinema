<?php
session_start();

include 'connectdb.php'; 


if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Verificar se o ID do filme foi fornecido na solicitação
if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $conn = estabelerConexao();

    $filmeId = $_GET['id'];

    // Substitua 'sua_tabela' pelo nome real da tabela no seu banco de dados
    $sql = "DELETE FROM filmes WHERE id = :filmeId";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':filmeId', $filmeId, PDO::PARAM_INT);
        $stmt->execute();

        // Redirecionar de volta para a página de categorias após a exclusão
        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        echo "Erro ao excluir o filme: " . $e->getMessage();
    }
} else {
    echo "ID inválido.";
}


?>
