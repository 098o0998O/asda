<?php
// includes/functions.php

// Kullanıcı kaydı
function registerUser($pdo, $username, $password, $email) {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
    return $stmt->execute([$username, $hashedPassword, $email]);
}

// Kullanıcı girişi
function loginUser($pdo, $username, $password) {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    if ($user && password_verify($password, $user['password'])) {
        return $user;
    }
    return false;
}

// VIP kontrolü
function isVip($user) {
    return isset($user['vip']) && $user['vip'] == 1;
}

// VIP üyeliği yükseltme (örneğin 30 gün süreyle)
function upgradeToVip($pdo, $userId) {
    $stmt = $pdo->prepare("UPDATE users SET vip = 1, vip_expire = DATE_ADD(NOW(), INTERVAL 30 DAY) WHERE id = ?");
    return $stmt->execute([$userId]);
}
?>
