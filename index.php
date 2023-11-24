<!-- index.php -->

<?php
session_start();


if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $logoutLink = '<a href="logout.php">Logout</a>';
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema App</title>

</head>
<body>

    <header>
        <div class="user-info">
            Bem-vindo, <?php echo $username; ?>! <?php echo $logoutLink; ?>
        </div>
    </header>


</body>
</html>
