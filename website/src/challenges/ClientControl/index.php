<?php

require __DIR__ . '/../../api/quiz_entry.php';

EnforceChallengeAccess(4);

$challenge_complete = false;
$incorrect = false;

if (isset($_POST['submit'])) {
	$un=$_POST['username'];
	$pw=$_POST['password'];

	$challenge_complete = ($un === 'SP09_4008_5874_2391' && $pw === 'quatrocientos_quatro');
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
				<iframe src="https://www.youtube.com/embed/qELSSAspRDI?controls=0&showinfo=0&rel=0&autoplay=1&loop=1&mute=1"
					frameborder="0" allowfullscreen muted mute></iframe>
			</div>
		</div>

		<!-- Intro -->
		<section id="intro" class="wrapper style1 fullscreen fade-up">
			<div class="inner">
				<h2>Client Control</h2>
				<p4>
					<?php if ($challenge_complete) { ?>
					You found the correct username and password.
					<?php } else { ?>
					Log into Fuego Banks and find out what mister Narcos' bank ballance is. His wife wants to run away.
					<?php } ?>
				</p4>
				<button type="button" class="collapsible">
					<?= $challenge_complete ? "Complete challenge" : "Start here" ?>
				</button>
				<div class="content">
					<p4><a href="./FuegoBanks/" target="_blank">Fuego Banks</a></p4>
					<br>
					<p4>Inspect element</p4>
					<br>
					<p4>Obfuscation is being used, what have we learned in challenge 1?</p4>
					<br>
					<p4>Telebancos por a que?</p4>
				</div>
			</div>
			<form method="post" action="">
				<div class="input_bar">
					<input type="text" name="username" id="un" placeholder="Bank account number" />
					<input type="password" name="password" id="pw" placeholder="Balance" required />
				</div>
				<br />
				<input type="submit" name="submit" value="Login" class="primary" />
			</form>
		</section>
	</div>
	<?php if ($challenge_complete) { ?>
	<script language="javascript">
		var complete = document.getElementsByClassName("collapsible")[0];
		
		complete.addEventListener('click', () => {
			window.ctf_quiz(4, encodeURIComponent(`9p97A!54zA89yDhKQ$@!$PXFid?QaqD&8x?iBtqB`)).then((success) => {

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