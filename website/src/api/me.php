<?php

require __DIR__ . '/env.php';

session_start();

function GetUserInfo() {
    if (!isset($_SESSION['uid'])) {
        return [false, 401];
    }
    
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_MAIN);
    
    if ($mysqli->connect_errno) {
        return [false, 500];
    }
    
    $stmt = $mysqli->prepare('SELECT * FROM `users` WHERE `id`=?');
    
    if (!$stmt) {
        return [false, 500];
    }
    
    $stmt->bind_param('d', $_SESSION['uid']);
    $stmt->execute();
    
    $result = $stmt->get_result()->fetch_assoc();
    
    if (!$result || $result['id'] !== $_SESSION['uid']) {
        return [false, 404];
    }
    
    http_response_code(200);
    
    return [true, [
        "username" => $result['username'],
        "challenge_idx" => $result['challenge']
    ]];
}

if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) {
    $resp = GetUserInfo();
    if (!$resp[0]) {
        http_response_code($resp[1]);
        exit();
    } else {
        http_response_code(200);
        header('Content-Type: application/json');
        echo json_encode($resp[1]);
    }
}