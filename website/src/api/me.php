<?php

require __DIR__ . '/env.php';

session_start();

if (!isset($_SESSION['uid'])) {
    http_response_code(401);
    exit();
}

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_MAIN);

if ($mysqli->connect_errno) {
    http_response_code(500);
    exit();
}

$stmt = $mysqli->prepare('SELECT * FROM `users` WHERE `id`=?');

if (!$stmt) {
    http_response_code(500);
    exit();
}

$stmt->bind_param('d', $_SESSION['uid']);
$stmt->execute();

$result = $stmt->get_result()->fetch_assoc();

if (!$result || $result['id'] !== $_SESSION['uid']) {
    http_response_code(404);
    exit();
}

http_response_code(200);

header('Content-Type: application/json');
echo json_encode([
    "username" => $result['username'],
    "challenge_idx" => $result['challenge']
]);