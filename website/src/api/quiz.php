<?php

require __DIR__ . '/me.php';

function GetChallengeFlag($chlg_id) {
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_MAIN);
    
    if ($mysqli->connect_errno) {
        return false;
    }
    
    $stmt = $mysqli->prepare('SELECT * FROM `flags` WHERE `challenge`=?');
    
    if (!$stmt) {
        return false;
    }
    
    $stmt->bind_param('d', $chlg_id);
    $stmt->execute();
    
    $result = $stmt->get_result()->fetch_assoc();
    
    if (!$result) {
        return false;
    }

    return $result['flag'];
}

function GetChallengeQuiz($chlg_id) {
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_MAIN);
    
    if ($mysqli->connect_errno) {
        return false;
    }
    
    $stmt = $mysqli->prepare('SELECT * FROM `Quiz` WHERE `challenge`=?');
    
    if (!$stmt) {
        return false;
    }
    
    $stmt->bind_param('d', $chlg_id);
    $stmt->execute();
    
    $result = $stmt->get_result()->fetch_assoc();
    
    if (!$result) {
        return false;
    }

    return $result;
}

function UpdateUserChallenge($uid, $challenge) {
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_MAIN);
    
    if ($mysqli->connect_errno) {
        return false;
    }
    
    $stmt = $mysqli->prepare('UPDATE `users` SET `challenge`=? WHERE `id`=?');
    
    if (!$stmt) {
        return false;
    }
    
    $stmt->bind_param('dd', $challenge, $uid);
    $stmt->execute();

    return true;
}

function GetQuizInfo() {
    $user_info = GetUserInfo();
    if (!$user_info[0]) {
        http_response_code($user_info[1]);
        exit();
    }

    $user_info = $user_info[1];
    $user_challenge = $user_info['challenge_idx'];
    $request_challenge = $_GET['id'];
    $request_flag = $_GET['flag'];

    if (!is_numeric($request_challenge)) {
        http_response_code(400);
        exit();
    }

    header("Content-Type: application/json");

    $request_challenge = intval($request_challenge);

    // User tried to get quiz info from challenge that they don't have access to
    if ($user_challenge < $request_challenge) {
        http_response_code(200);
        echo json_encode([
            "success" => false,
            "error" => "ERR_CHALLENGE_PERM_DENIED"
        ]);
        exit();
    }

    $server_flag = GetChallengeFlag($request_challenge);
    if ($server_flag !== $request_flag) {
        http_response_code(200);
        echo json_encode([
            "success" => false,
            "error" => "ERR_CHALLENGE_FLAG_INVALID"
        ]);
        exit();
    }

    $quiz = /*[
        "challenge" => 0,
        "outro" => "What did you just do? You looked at the html code and within it you found a little piece of JavaScript which contained the username and password you needed. You couldn't just copy paste this though, because the data was obfuscated. So we used a deobfuscator to get the correct username and password.",
        "quiz_vraag" => "How should you store a password?",
        "correct_antwoord" => "Hashing",
        "antwoorden" => "The best way possible|Hardcoded|Obfuscation"
    ];*/ GetChallengeQuiz($request_challenge);
    
    if (!$quiz) {
        http_response_code(500);
        exit();
    }

    // Splits antwoorden en voeg correct antwoord toe tot deze array
    $answers = explode("|", $quiz['antwoorden']);
    array_push($answers, $quiz['correct_antwoord']);

    // Antwoorden op willekeurige plekken
    shuffle($answers);

    unset($quiz['correct_antwoord']);
    $quiz['antwoorden'] = $answers;
    $quiz['success'] = true;

    http_response_code(200);
    echo json_encode($quiz, JSON_PRETTY_PRINT);
}

function SubmitQuizAnswer() {
    $user_info = GetUserInfo();
    if (!$user_info[0]) {
        http_response_code($user_info[1]);
        exit();
    }

    $user_info = $user_info[1];
    $user_challenge = $user_info['challenge_idx'];
    $request_challenge = $_GET['id'];
    $request_flag = $_GET['flag'];
    $request_answer = $_GET['answer'];

    if (!is_numeric($request_challenge)) {
        http_response_code(400);
        exit();
    }

    header("Content-Type: application/json");

    $request_challenge = intval($request_challenge);

    // User tried to get quiz info from challenge that they don't have access to
    if ($user_challenge < $request_challenge) {
        http_response_code(200);
        echo json_encode([
            "success" => false,
            "error" => "ERR_CHALLENGE_PERM_DENIED"
        ]);
        exit();
    }

    $server_flag = GetChallengeFlag($request_challenge);
    if ($server_flag !== $request_flag) {
        http_response_code(200);
        echo json_encode([
            "success" => false,
            "error" => "ERR_CHALLENGE_FLAG_INVALID"
        ]);
        exit();
    }

    $quiz = /*[
        "challenge" => 0,
        "outro" => "What did you just do? You looked at the html code and within it you found a little piece of JavaScript which contained the username and password you needed. You couldn't just copy paste this though, because the data was obfuscated. So we used a deobfuscator to get the correct username and password.",
        "quiz_vraag" => "How should you store a password?",
        "correct_antwoord" => "Hashing",
        "antwoorden" => "The best way possible|Hardcoded|Obfuscation"
    ];*/ GetChallengeQuiz($request_challenge);
    
    if (!$quiz) {
        http_response_code(500);
        exit();
    }

    if ($quiz['correct_antwoord'] !== $request_answer) {
        http_response_code(200);
        echo json_encode([
            "success" => false,
            "error" => "ERR_ANSWER_INCORRECT"
        ]);
        exit();
    }

    // UPDATE user challenge counter if user has not finished it before
    if ($user_info['challenge_idx'] < $request_challenge + 1) {
        UpdateUserChallenge($user_info['user_id'], $request_challenge + 1);
    }

    http_response_code(200);
    echo json_encode(["success" => true]);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    GetQuizInfo();
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    SubmitQuizAnswer();
} else {
    http_response_code(400);
    exit();
}