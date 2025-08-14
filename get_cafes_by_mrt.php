<?php
header('Content-Type: application/json; charset=utf-8');

//改成自己的
$host = "localhost";        // 主機位置，本機是 localhost
$user = "root";             // 預設使用者是 root
$pass = "12345";                 // 預設密碼是空白（如果你改過就填入）
$dbname = "CSV_DB_6";   

$station = isset($_GET['station']) ? $_GET['station'] : "";

if (empty($station)) {
    echo json_encode([
        "mode" => "mrt",
        "location" => "",
        "count" => 0,
        "results" => []
    ]);
    exit;
}

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $searchPrefix = '捷運' . $station; 
    $stmt = $pdo->prepare("SELECT * FROM cafes WHERE Mrt LIKE CONCAT(:prefix, '%')");
    $stmt->bindParam(":prefix", $searchPrefix);
    $stmt->execute();
    $cafes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $response = [
        "mode" => "mrt",
        "location" => $station,
        "count" => count($cafes),
        "results" => $cafes
    ];

    echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

} catch (PDOException $e) {
    echo json_encode([
        "mode" => "mrt",
        "location" => $station,
        "count" => 0,
        "results" => [],
        "error" => $e->getMessage()
    ]);
}
?>
