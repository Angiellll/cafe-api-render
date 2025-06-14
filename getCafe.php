<?php
// 告訴瀏覽器回傳的是 JSON 格式
header("Content-Type: application/json; charset=UTF-8");

// 引入連線設定
include 'db.php';

// 撰寫 SQL 查詢
$sql = "SELECT * FROM cafe";
$result = $conn->query($sql);

// 將結果存成陣列
$data = array();
if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// 輸出 JSON
echo json_encode($data, JSON_UNESCAPED_UNICODE);
?>
