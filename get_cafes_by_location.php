#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Created on Fri Aug  8 23:20:01 2025

@author: angie
"""

# 假設用欄位 city 來篩選（如果你用別的欄位就改成該欄位名稱

<?php
header("Content-Type: application/json; charset=UTF-8");
include 'db.php';

// 讀取 GET 參數 location
$location = isset($_GET['location']) ? $conn->real_escape_string($_GET['location']) : '';

if ($location === '') {
    // 如果沒帶 location，回傳空陣列或全部資料
    echo json_encode([]);
    exit;
}

// 用 LIKE 模糊搜尋 city 欄位（你可以改欄位名稱）
$sql = "SELECT * FROM cafe WHERE city LIKE '%$location%'";
$result = $conn->query($sql);

$data = array();
if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $row['wifi'] = intval($row['wifi']);
        $row['seat'] = floatval($row['seat']);
        $row['quiet'] = intval($row['quiet']);
        $row['tasty'] = floatval($row['tasty']);
        $row['cheap'] = floatval($row['cheap']);
        $row['music'] = floatval($row['music']);
        $row['latitude'] = floatval($row['latitude']);
        $row['longitude'] = floatval($row['longitude']);
        $data[] = $row;
    }
}

echo json_encode($data, JSON_UNESCAPED_UNICODE);
?>
