<?php
// vip_process.php
session_start();
require 'config.php';
require 'includes/functions.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION['user'];

if (upgradeToVip($pdo, $user['id'])) {
    // Kullanıcı bilgilerinin güncellenmesi
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$user['id']]);
    $_SESSION['user'] = $stmt->fetch();
    $_SESSION['success'] = "VIP üyeliğiniz başarıyla aktifleştirildi!";
} else {
    $_SESSION['error'] = "VIP üyelik aktifleştirilirken bir hata oluştu.";
}

header("Location: dashboard.php");
exit;
?>
