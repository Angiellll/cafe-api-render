<?php
header("Content-Type: application/json; charset=UTF-8");
include 'db.php';

$sql = "SELECT * FROM cafe";
$result = $conn->query($sql);

$data = array();
if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // 型別轉換，讓 JSON 回傳正確類型
        $row['wifi'] = intval($row['wifi']);
        $row['seat'] = floatval($row['seat']);
        $row['quiet'] = intval($row['quiet']);
        $row['tasty'] = floatval($row['tasty']);
        $row['cheap'] = floatval($row['cheap']);
        $row['music'] = floatval($row['music']);
        $row['latitude'] = floatval($row['latitude']);
        $row['longitude'] = floatval($row['longitude']);
        // 其他欄位不動，保留字串即可

        $data[] = $row;
    }
}

echo json_encode($data, JSON_UNESCAPED_UNICODE);
?>
