<?php

require __DIR__ . '/../../api/quiz_entry.php';

EnforceChallengeAccess(2);

$challenge_complete = false;
$incorrect = false;

if (isset($_POST['submit'])) {
	$un=$_POST['username'];
	$pw=$_POST['password'];

	$challenge_complete = ($un === 'admin' && $pw === 'abcd');
	$incorrect = !$challenge_complete;

	if ($incorrect) {
		http_response_code(403);
	}
}
?>

<html>

<head>
	<title>Masters of Deception</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="/assets/css/main.css" />
	<link rel="stylesheet" href="/assets/css/dark.min.css" />
	<link rel="icon" href="/assets/images/vendetta.png" type="image" sizes="16x16">
</head>

<body class="is-preload">
	<section id="sidebar">
		<div class="inner">
			<nav>
				<ul>
					<li><a href="/challenges">Go Back</a></li>
				</ul>
			</nav>
		</div>
	</section>

	<!-- Wrapper -->
	<div id="wrapper">
		<div class="video-background">
			<div class="video-foreground">
				<iframe
					src="https://www.youtube.com/embed/-MKapbz0GIo?controls=0&showinfo=0&rel=0&autoplay=1&loop=1&playlist=-MKapbz0GIo&mute=1"
					frameborder="0" allowfullscreen loop></iframe>
			</div>
		</div>

		<!-- Intro -->
		<section id="intro" class="wrapper style1 fullscreen fade-up">
			<div class="inner">
				<h2>Brute Force Attack</h2>
				<p4>
					<?php if ($challenge_complete) { ?>
					You found the correct username and password.
					<?php } else { ?>
					Username is "admin", crack the Password.
					<?php } ?>
				</p4>
				<button type="button" class="collapsible">
					<?= $challenge_complete ? "Complete challenge" : "Hint" ?>
				</button>
				<div class="content">
					<p4>Use a brute force attack <a href="https://github.com/scrolls5/HYDRA">HYDRA</a></p4>
				</div>
			</div>
			<form method="POST">
				<? if ($incorrect) { ?>
				<p5 style="color: red; margin-left: 110px;">Username/Password combination invalid</p5>
				<? } ?>
				<div class="input_bar">
					<input type="text" name="username" id="un" placeholder="Username" />
					<input type="password" name="password" id="pw" placeholder="Password" />
				</div>
				<br />
				<input type="submit" id="sub" value="Login" name="submit" class="primary" />
			</form>
		</section>
	</div>

	<?php if ($challenge_complete) { ?>
	<script language="javascript">
		var complete = document.getElementsByClassName("collapsible")[0];
		
		complete.addEventListener('click', () => {
			window.ctf_quiz(2, encodeURIComponent(`f4EzyhsY76z&hEBMFC8Htex9p5Rm$#P9j@Tr76cb`)).then((success) => {

			});
		});
	</script>
	<?php } else { ?>
	<script language="javascript">
		var coll = document.getElementsByClassName("collapsible");
		var i;

		for (i = 0; i < coll.length; i++) {
			coll[i].addEventListener("click", function () {
				this.classList.toggle("active");
				var content = this.nextElementSibling;
				if (content.style.display === "block") {
					content.style.display = "none";
				} else {
					content.style.display = "block";
				}
			});
		}
	</script>
	<?php } ?>

	<script src="/assets/js/jquery.min.js"></script>
	<script src="/assets/js/jquery.scrollex.min.js"></script>
	<script src="/assets/js/jquery.scrolly.min.js"></script>
	<script src="/assets/js/browser.min.js"></script>
	<script src="/assets/js/breakpoints.min.js"></script>
	<script src="/assets/js/util.js"></script>
	<script src="/assets/js/main.js"></script>
	<script src="/assets/js/sweetalert2.min.js"></script>
	<script src="/assets/js/quiz.js"></script>
</body>

</html>

<!-- .\hydra.exe -V -t 25 -f -l admin -x 4:6:a -s 8080 localhost http-post-form "/challenges/dontbelazy/:username=admin&password=^PASS^&submit=Login:S=You found the correct:H=Cookie: PHPSESSID=<?= $_COOKIE['PHPSESSID'] ?>" -->
