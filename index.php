<?php
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
    <title>Cinema App</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        header {
            background-color: #333;
            padding: 10px;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logout {
            text-decoration: none;
            color: white;
        }

        .navbar {
            display: flex;
            align-items: center;
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
            margin-right: 10px;
        }

        .user-info {
            display: flex;
            align-items: center;
        }

        .user-info span {
            margin-right: 10px;
        }

        .welcome {
            padding: 150px; 
            background-color: grey;
            text-align: center;
        }
        .right-button {
            position: fixed;
            top: 450px;
            right: 20px;
            padding: 10px;
            background-color: #333;
            text-decoration: none;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <header>
        <div class="navbar">
      
            <a href="index.php">Página Inicial</a>
            <a href="perfil.php">Perfil</a>
        </div>

        <div class="user-info">
           
            <a class="logout" href="logout.php">Logout</a>
        </div>
    </header>

   
    <div class="welcome">
        <h2>Bem-vindo, <?php echo $username; ?>!</h2>
    </div>

    <a class="right-button" href="adicionarfilme.php" >Clique-me</a>

</body>
</html>
