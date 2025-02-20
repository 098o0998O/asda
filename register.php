<?php
// register.php
session_start();
require 'config.php';
require 'includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username         = trim($_POST['username']);
    $email            = trim($_POST['email']);
    $password         = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        $error = "Şifreler eşleşmiyor!";
    } else {
        if (registerUser($pdo, $username, $password, $email)) {
            $_SESSION['success'] = "Kayıt başarılı, lütfen giriş yapınız.";
            header("Location: login.php");
            exit;
        } else {
            $error = "Kayıt sırasında hata oluştu!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Kayıt Ol</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="container">
        <h2>Kayıt Ol</h2>
        <?php if(isset($error)) echo "<p class='error'>{$error}</p>"; ?>
        <form action="register.php" method="post">
            <input type="text" name="username" placeholder="Kullanıcı Adı" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Şifre" required>
            <input type="password" name="confirm_password" placeholder="Şifre Tekrar" required>
            <button type="submit">Kayıt Ol</button>
        </form>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>
