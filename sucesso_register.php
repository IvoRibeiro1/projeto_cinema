        <?php

        session_start();

        if(!empty($_SESSION['username'])){
            $username = $_SESSION['username'];
        }

        ?>
        
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
        <div class="container">
        <div class="form-container">
            <form action="process_login.php" method="post">
                <h2><?php echo "Parabéns, $username!" ?></h2>
                <label for="username">A sua conta foi criada com sucesso</label>
                <br>
                <a class="button" href="login.php">Voltar para login</a>
            </form>
        </div>
        </body>
        </html>