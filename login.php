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
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="">
     <?php if ($pesan) echo "$pesan"; ?>

    <form action="" method="POST">
        <label for="">Email :</label>
        <input type="email" name="email" placeholder="Email">
        <label for="">Password :</label>
        <input type="password" name="pass" placeholder="Password (min 6 karakter)">
        <button type="submit" class="">Masuk</button>
    </form>

    <p>Belom Punya Akun?
        <a href="register.php" class="text-gray-600 hover:text-blue-600 transition-color duration-200">Register</a>
    </p>
</body>
</html>