<?php

require_once('connectdb.php');

session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleindex.css">

    <title>Comunidade</title>

    <style>
        .user-info {
            display: flex;
            align-items: center;
        }

        .user-info a {
            color: #fff;
            text-decoration: none;
            margin-left: 10px;
        }

        .postagens-comunidade {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .postagens-comunidade h2 {
            color: #333;
        }

        .postagens-comunidade .postagem {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 8px;
        }

        .postagens-comunidade strong {
            color: #333;
        }
    </style>
</head>

<body>

    <header>
        <div class="navbar">
            <a href="index.php">Página Inicial</a>
            <a href="minhaslistas.php">Minhas listas</a>
            <a href="community.php">Comunidade</a>
            <a class="buttonadd" href="adicionarfilme.php">Adicionar filme</a>
        </div>

        <div class="user-info">
            <a class="logout" href="logout.php">Logout</a>
        </div>
    </header>

    <!-- Exibir postagens da comunidade -->
    <section class="postagens-comunidade">
        <h2>Postagens da Comunidade</h2>
        <?php
        try {
            $conexao = estabelerConexao();

            $selectSql = "SELECT * FROM community_posts ORDER BY post_time DESC";
            $stmt = $conexao->query($selectSql);
            $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($posts) {
                foreach ($posts as $post) {
                    echo '<div class="postagem">';
                    echo '<strong>Título:</strong> ' . $post['movie_title'] . '<br>';
                    echo '<strong>Rating:</strong> ' . $post['rating'] . '<br>';
                    echo '<strong>Notas:</strong> ' . $post['notas'] . '<br>';
                    echo '<strong>Utilizador:</strong> ' . $post['username'] . '<br>';
                    echo '<strong>Data e Hora:</strong> ' . $post['post_time'];
                    echo '</div>';
                }
            } else {
                echo '<p>Nenhuma postagem na comunidade ainda.</p>';
            }
        } catch (PDOException $e) {
            echo "Erro ao obter postagens da comunidade: " . $e->getMessage();
        }
        ?>
    </section>

</body>

</html>

