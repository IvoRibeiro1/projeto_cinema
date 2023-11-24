<!-- index.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema Login and Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <div class="form-container">
            <form action="process_login.php" method="post">
                <h2>Login</h2>
                <label for="username">Username:</label>
                <input type="text" name="username" required>
                <label for="password">Password:</label>
                <input type="password" name="password" required>
                <button class="button" type="submit">Login</button>
                <br>
                <a class="button" href="register.php">Criar conta</a>
            </form>
        </div>

       
    </div>

</body>
</html>
