<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minecraft VIP Üyelik Sistemi</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header>
    <h1>Minecraft VIP Üyelik Sistemi</h1>
    <nav>
        <a href="index.php">Anasayfa</a>
        <?php if(isset($_SESSION['user'])): ?>
            <a href="dashboard.php">Panel</a>
            <a href="logout.php">Çıkış Yap</a>
        <?php else: ?>
            <a href="login.php">Giriş Yap</a>
            <a href="register.php">Kayıt Ol</a>
        <?php endif; ?>
    </nav>
</header>
