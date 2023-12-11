<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style_register.css">
</head>
<body>
<div class="form-container">
            <form action="process_register.php" method="post">
                <h2>Register</h2>
                <label for="username">Username:</label>
                <input type="text" name="username" required>
                <label for="password">Password:</label>
                <input type="password" name="password" required>
                <button class="button type="submit">Register</button>
            </form>
        </div>
</body>
</html>