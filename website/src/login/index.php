<?php

require __DIR__ . '/../api/env.php';

session_start();

// Check if user is already logged in
if (isset($_SESSION['uid'])) {
	header('Location: /challenges');
	exit();
}

function doLogin($username, $password, $token) {
	if ($token !== $_SESSION['token']) {
		http_response_code(401);
		
		global $error;
		$error = 'Session expired, try logging in again';

		return;
	}

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_MAIN);

	if ($mysqli->connect_errno) {
		http_response_code(500);
		
		global $error;
		$error = 'Failed to establish database connection';

		return;
	}

	$stmt = $mysqli->prepare('SELECT * FROM `users` WHERE `username`=?');

	if (!$stmt) {
		global $error;
		$error = $mysqli->error;
		return;
	}

	$stmt->bind_param('s', $username);
	$stmt->execute();

	$result = $stmt->get_result()->fetch_assoc();

	if (!$result || $result['username'] !== $username || $result['password'] !== hash_hmac('sha512', $password, HMAC_KEY)) {
		global $error;
		$error = 'Username or password incorrect';

		return;
	}
	
	$_SESSION['uid'] = $result['id'];

	header('Location: /challenges');
	exit();
}

if (isset($_POST['submit'])) {
	doLogin($_POST['username'], $_POST['password'], $_POST['token']);
}

$_SESSION['token'] = bin2hex(random_bytes(32));

?>
<html>

<head>
	<title>Masters of Deception</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="../assets/css/main.css" />
	<link rel="icon" href="../assets/images/vendetta.png" type="image" sizes="16x16">
</head>

<body class="is-preload">

	<section id="sidebar">
		<div class="inner">
			<nav>
				<ul>
					<li><a href="#" onclick="window.history.back();">Go Back</a></li>
				</ul>
				<ul>
					<li><a href="/register">Register new account</a></li>
				</ul>
			</nav>
		</div>
	</section>

	<!-- Wrapper -->
	<div id="wrapper">
		<div class="video-background">
			<div class="video-foreground">
				<!-- Add "&mute=1" after url to make autoplay=1 work -->

				<iframe
					src="https://www.youtube.com/embed/-MKapbz0GIo?controls=0&showinfo=0&rel=0&autoplay=1&loop=1&playlist=-MKapbz0GIo&mute=1"
					frameborder="0" allowfullscreen muted loop></iframe>
			</div>
		</div>

		<!-- Intro -->
		<section id="intro" class="wrapper style1 fullscreen fade-up">
			<div class="inner">
				<h2>Login to Masters of Deception CTF</h2>
				<p4>
					If you are new, you can register a new account by clicking the button on the left
				</p4>
			</div>
			<form method="POST">
				<? if (isset($error)) { ?>
				<p5 style="color: red; margin-left: 110px;"><?= $error ?></p5>
				<? } ?>
				<div class="input_bar">
					<input type="text" name="username" id="un" placeholder="Username" />
					<input type="password" name="password" id="pw" placeholder="Password" />
					<input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
				</div>
				<br />
				<input type="submit" id="sub" value="Login" name="submit" class="primary" />
			</form>
		</section>

		<script src="../assets/js/jquery.min.js"></script>
		<script src="../assets/js/jquery.scrollex.min.js"></script>
		<script src="../assets/js/jquery.scrolly.min.js"></script>
		<script src="../assets/js/browser.min.js"></script>
		<script src="../assets/js/breakpoints.min.js"></script>
		<script src="../assets/js/util.js"></script>
		<script src="../assets/js/main.js"></script>
	</div>
</body>
</html>