<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <a href="logout.php">Keluar.</a>
       <h2>Selamat Datang, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h2>
    </header>
</body>
</html>