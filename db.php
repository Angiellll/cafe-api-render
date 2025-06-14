<?php
$host = "localhost";        // 主機位置，本機是 localhost
$user = "root";             // 預設使用者是 root
$pass = "12345";                 // 預設密碼是空白（如果你改過就填入）
$dbname = "CSV_DB_6";       // 你的資料庫名稱，改成你的！

// 建立資料庫連線
$conn = new mysqli($host, $user, $pass, $dbname);
$conn->set_charset("utf8"); // 設定編碼為 utf8，避免亂碼

// 檢查連線是否成功
if ($conn->connect_error) {
    die("連線失敗：" . $conn->connect_error);
}
?>
