<?php
// vip_purchase.php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>VIP Satın Al</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="container">
        <h2>VIP Üyelik Satın Al</h2>
        <p>VIP üyelik hesabınıza ekstra özellikler kazandırır. (Ödeme entegrasyonunuzu ekleyebilirsiniz.)</p>
        <form action="vip_process.php" method="post">
            <button type="submit">VIP Üyeliği Aktifleştir (30 Gün)</button>
        </form>
        <a href="dashboard.php">Geri Dön</a>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>
