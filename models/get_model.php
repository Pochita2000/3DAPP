<?php
// 允许跨域请求
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// 处理GET请求
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // 读取x3d模型数据
    $model_data = file_get_contents("coke.x3d");

    // 返回x3d模型数据
    header('Content-Type: application/x3d+xml');
    echo $model_data;
}

// 处理POST请求
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 处理从前端页面发送的数据
    $data = json_decode(file_get_contents('php://input'), true);

    // TODO: 处理数据并返回结果
}