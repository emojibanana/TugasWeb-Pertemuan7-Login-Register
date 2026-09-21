<?php
session_start();
$pesan = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nama = trim($_POST['nama']);
    $email = trim($_POST['email']);
    $password = $_POST['pass'];

    //validasi
    if (empty($nama) || empty($email || empty($password))) {
        $pesan = "Isi Semua Dulu Woi!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $pesan = "Email nya Gk Betol!";
    } elseif (strlen($password) < 6) {
        $pesan = "Password Harus 6 Digit atau Lebih";
    } else {
        //sanitasi
        $nama = htmlspecialchars($nama);

        //hash password
        $hashedPass = password_hash($password, PASSWORD_DEFAULT);

        //Baca data
        $file = 'user.json';
        $json = file_get_contents($file);
        $users = json_decode($json, true);

        //cek email yang dh ada
        $email_ada = false;
        foreach ($users as $u) {
            if ($u['email'] === $email) {
                $email_ada = true;
                break;
            }
        }

        if ($email_ada) {
            $pesan = "Email Dh Ada, Pake Yang Lain.";
        } else {
            //Tambah user baru
            $newUser = [
                'id' => count($users) + 1,
                'nama' => $nama,
                'email' => $email,
                'pass' => $hashedPass,
                'created_at' => date('Y-m-d H:i:s')
            ];

            $users[] = $newUser;

            //simpan lagi ke file
            file_put_contents(
                $file,
                json_encode($users, JSON_PRETTY_PRINT)
            );
            echo '<script>window.location="login.php?msg=registered";</script>';
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <?php if ($pesan) echo "<p style='color:red'>$pesan</p>"; ?>

    <form action="" method="POST">
        <input type="text" name="nama" placeholder="Nama Lengkap">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="pass" placeholder="Password (min 6 karakter)">
        <button type="submit">Daftar</button>
    </form>

    <p>Sudah Punya Akun?
        <a href="login.php">Login</a>
    </p>
</body>
</html>