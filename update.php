<?php
session_start();

include 'connectdb.php'; // Substitua pelo caminho real do seu arquivo

// Verificar se o usuário está logado
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Verificar se o ID do filme foi fornecido na solicitação
if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $filmeId = $_GET['id'];

    // Substitua 'sua_tabela' pelo nome real da tabela no seu banco de dados
    $sql = "SELECT * FROM filmes WHERE id = :filmeId";

    try {
        $conn = estabelerConexao();
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':filmeId', $filmeId, PDO::PARAM_INT);
        $stmt->execute();
        $filme = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$filme) {
            echo "ID de filme inválido.";
            exit();
        }
    } catch (PDOException $e) {
        echo "Erro ao recuperar informações do filme: " . $e->getMessage();
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Filme</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h2>Atualizar Filme</h2>

    <form action="process_update.php?id=<?php echo $filmeId; ?>" method="post"> 
        <label for="new_title">Novo Título:</label>
        <input type="text" name="new_title" value="<?php echo $filme['nomefilme']; ?>" required>

        <label for="new_rating">Novo Rating:</label>
        <input type="text" name="new_rating" value="<?php echo $filme['rating']; ?>" required>

        <label for="new_notes">Novas Notas:</label>
        <textarea name="new_notes"><?php echo $filme['notas']; ?></textarea>

        <input type="hidden" name="filmeId" value="<?php echo $filmeId; ?>">

        <button type="submit">Atualizar</button>
    </form>

</body>

</html>
