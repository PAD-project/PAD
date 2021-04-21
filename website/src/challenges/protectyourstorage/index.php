<?php

require __DIR__ . '/../../api/quiz_entry.php';

EnforceChallengeAccess(3);

$challenge_complete = false;
$incorrect = false;

if (isset($_POST['submit'])) {
	$un=$_POST['username'];
	$pw=$_POST['password'];

	$challenge_complete = ($un === 'harry_hond' && $pw === 'woef_woef');
	$incorrect = !$challenge_complete;
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
					<li><a href="../challenges">Go Back</a></li>
				</ul>
			</nav>
		</div>
	</section>

	<!-- Wrapper -->
	<div id="wrapper">
		<div class="video-background">
			<div class="video-foreground">
				<iframe src="https://www.youtube.com/embed/qELSSAspRDI?controls=0&showinfo=0&rel=0&autoplay=1&loop=1"
					frameborder="0" allowfullscreen></iframe>
			</div>
		</div>

		<!-- Intro -->
		<section id="intro" class="wrapper style1 fullscreen fade-up">
			<div class="inner">
				<h2>Protect your storage</h2>
				<p4>
					<?php if ($challenge_complete) { ?>
					You found the correct username and password.
					<?php } else { ?>
					Try to find the correct login credentials in the database.
					<?php } ?>
				</p4>
				<button type="button" class="collapsible">
					<?= $challenge_complete ? "Complete challenge" : "Hint" ?>
				</button>
				<div class="content">
					<p4>1. Try using nmap port scan<br></p4>
					<p5>2. It can't hurt to check the source once again, can it?<br></p5>
					<p6>3. What kind of hashes exist? Maybe you could use that...</p6>
				</div>
			</div>
			<form method="post" action="">
				<? if ($incorrect) { ?>
				<p5 style="color: red; margin-left: 110px;">Username/Password combination invalid</p5>
				<? } ?>
				<div class="input_bar">
					<!-- Voor Dhr. bende,

						Ik heb wat gesleuteld aan de database en als u kunt inloggen om feedback
						 te geven zou ik dat zeer op prijs stellen.

						Gebruikersnaam: beeste_bende
						    Wachtwoord: ikhouvantennisballen 

						U hoeft zich trouwens geen zorgen te maken dat andere gebruikers gaan inloggen,
						 ik heb de database alleen toegankelijk gemaakt via een andere ingang.
					
						Mvg, ?
					-->
					<input type="text" name="username" id="un" placeholder="Username" />
					<input type="password" name="password" id="pw" placeholder="Password" required />
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
			window.ctf_quiz(3, encodeURIComponent(`N5oMgMYA$t?kYPkx6afCCii7?6snMnH6NrRc7TNa`)).then((success) => {});
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