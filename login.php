<?php
session_start();
$pesan = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = trim($_POST['email']);
    $password = $_POST['pass'];

    //baca data user
    $json = file_get_contents('user.json');
    $users = json_decode($json, true);

    //cari user berdsarkan emailnya
    $foundUser = null;
    foreach ($users ?? [] as $user) {
        if ($user['email'] === $email) {
            $foundUser = $user;
            break;
        }
    }

    //verifikasi password
    if ($foundUser && password_verify($password, $foundUser['pass'])) {
        $_SESSION['user_id'] = $foundUser['id'];
        $_SESSION['user'] = $foundUser['nama'];
        $_SESSION['email'] = $foundUser['email'];   

        $pesan = "";
        header("Location: dashboard.php?pesan=Masuk");
        exit;
    } else {
        $pesan = "<p style='color:red'>Email ato Password Salah!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
     <?php if ($pesan) echo "$pesan"; ?>

    <form action="" method="POST">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="pass" placeholder="Password (min 6 karakter)">
        <button type="submit">Masuk</button>
    </form>

    <p>Belom Punya Akun?
        <a href="register.php">Register</a>
    </p>
</body>
</html>