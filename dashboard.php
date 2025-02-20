<?php
// dashboard.php
session_start();
require 'config.php';
require 'includes/functions.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Panel</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="container">
        <h2>Hoşgeldin, <?php echo htmlspecialchars($user['username']); ?></h2>
        <?php if (isVip($user)) { ?>
            <p>VIP Üyeliğiniz Aktif. Son Kullanım Tarihi: <?php echo $user['vip_expire']; ?></p>
        <?php } else { ?>
            <p>VIP Üyeliğiniz aktif değil. Hemen VIP üye olmak için aşağıdaki butona tıklayın.</p>
            <a href="vip_purchase.php" class="vip-button">VIP Üyelik Satın Al</a>
        <?php } ?>
        <a href="logout.php">Çıkış Yap</a>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>
