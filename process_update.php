<?php
session_start();

include 'connectdb.php';

    // Processar o formulário de atualização se enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $newTitle = $_POST["new_title"];
        $newRating = $_POST["new_rating"];
        $newNotes = $_POST["new_notes"];

        // Recuperar o ID do filme do campo oculto
        $filmeId = $_POST["filmeId"];

        $conexao = estabelerConexao();

        // Substitua 'sua_tabela' pelo nome real da tabela no seu banco de dados
        $updateSql = "UPDATE filmes SET nomefilme = :newTitle, rating = :newRating, notas = :newNotes WHERE id = :filmeId";

        try {
            $updateStmt = $conexao->prepare($updateSql);
            $updateStmt->bindParam(':newTitle', $newTitle);
            $updateStmt->bindParam(':newRating', $newRating);
            $updateStmt->bindParam(':newNotes', $newNotes);
            $updateStmt->bindParam(':filmeId', $filmeId, PDO::PARAM_INT);
            $updateStmt->execute();

            // Redirecionar após a atualização
            header("Location: minhaslistas.php");
            exit();
        } catch (PDOException $e) {
            echo "Erro ao atualizar o filme: " . $e->getMessage();
        }
    
} else {
    echo "ID de filme inválido.";
    exit();
}
?>
