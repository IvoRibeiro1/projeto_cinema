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
    <title>Formulário de Filme</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        form {
            max-width: 600px;
            margin: 120px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <form action="process_form.php" method="post">
        <label for="category">Categoria:</label>
        <select id="category" name="category">
        <?php
				$categorias =  getCategorias();
                foreach($categorias as $categoria){
                    echo "<option value='$categoria'>$categoria</option>";
                }
                ?>
        </select>

        <label for="movieName">Nome do Filme:</label>
        <input type="text" id="movieName" name="movieName" required>

        <label for="rating">Rating:</label>
        <input type="number" id="rating" name="rating" min="0" max="10" step="0.1" required>

        <label for="notes">Notas:</label>
        <textarea id="notes" name="notes" rows="4"></textarea>

        <button type="submit">Adicionar Filme</button>
    </form>

</body>
</html>
