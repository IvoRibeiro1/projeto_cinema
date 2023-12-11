<?php
session_start();

include 'connectdb.php'; // Substitua pelo caminho real do seu arquivo

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}

// Consulta para obter todos os filmes
$sql = "SELECT * FROM filmes";

try {
    $conexao = estabelerConexao();
    $stmt = $conexao->query($sql);
    $filmes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro ao obter filmes: " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styleindex.css">
</head>

<body>

    <header>
        <div class="navbar">
            <a href="index.php">Página Inicial</a>
            <a href="minhaslistas.php">Minhas listas</a>
            <a href="comunidade.php">Comunidade</a>
            <a class="buttonadd" href="adicionarfilme.php">Adicionar filme</a>
        </div>

        <div class="user-info">
            <a class="logout" href="logout.php">Logout</a>
        </div>
    </header>

    <section class="filmes">
    <?php
    // Obter categorias usando a função getCategorias()
    $categorias = getCategorias();

    if ($categorias) {
        foreach ($categorias as $categoria) {
            // Obter filmes da categoria usando a função getFilmesByCategoria()
            $filmes = getFilmesByCategoriaAll($categoria);

            echo '<h2>' . $categoria . '</h2>';
            echo '<table class="categories-table">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Nome do Filme</th>';
            echo '<th>Rating</th>';
            echo '<th>Notas</th>';
            echo '<th>Eliminar </th>';
            echo '<th>Update</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            if ($filmes) {
                foreach ($filmes as $filme) {
                    echo '<tr>';
                    echo '<td>' . $filme['nomefilme'] . '</td>';
                    echo '<td>' . $filme['rating'] . '</td>';
                    echo '<td>' . $filme['notas'] . '</td>';
                    echo '<td>' . '<a href="delete1.php?id=' . $filme['id'] . '"><button class="delete">Eliminar</button></a>' . ' </td>';
                    echo '<td>' . '<a href="update1.php?id=' . $filme['id'] . '"><button class="update">Update</button></a>' . ' </td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr>';
                echo '<td colspan="3">Nenhum filme nesta categoria.</td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
        }
    } else {
        echo '<p>Nenhuma categoria encontrada.</p>';
    }
    ?>
    </section>


</body>

</html>
