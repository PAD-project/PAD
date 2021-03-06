<html>
	<head>
		<title>Masters of Deception</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="icon" href="images/vendetta.png" type="image" sizes="16x16">
	</head>
	<body class="is-preload">

			<section id="sidebar">
				<div class="inner">
					<nav>
						<ul>
							<li><a href="challenges.html">Go Back</a></li>
						</ul>
					</nav>
				</div>
			</section>

		<!-- Wrapper -->
			<div id="wrapper">
				<div class="video-background">
				    <div class="video-foreground">
				      <iframe src="https://www.youtube.com/embed/-MKapbz0GIo?controls=0&showinfo=0&rel=0&autoplay=1&loop=1&playlist=-MKapbz0GIo" frameborder="0" allowfullscreen loop></iframe>
				    </div>
				  </div>

				<!-- Intro -->
					<section id="intro" class="wrapper style1 fullscreen fade-up">
						<div class="inner">
							<h2>Brute Force Attack</h2>
							<p4>
									Username is "admin", crack the Password
							</p4>
							<button type="button" class="collapsible">Hint</button>
							<div class="content">
							<p4>Use a brute force attack <a href="https://github.com/scrolls5/HYDRA"/>HYDRA</a></p4>
							</div>
						</div>
					<form method="POST">
							<div class="input_bar">
								<input type="text" name="username" id="un" placeholder="Username"/>
								<input type="password" name="password" id="pw" placeholder="Password"/>
							</div>
									<br />
									<input type="submit" id="sub" value="Login" name="submit" class="primary" />
							</div>
						</div>
					</form>
					</section>
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

			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>

<?php
   if (isset($_POST['submit'])) {
      $un=$_POST['username'];
      $pw=$_POST['password'];

      if ($un=='admin' && $pw=='test') {
         echo "Correct Password";
         exit();
      }
      else
         echo '<div class="inner">Wrong Password</div>';
   }
?>

<!-- .\hydra.exe -l admin -P .\passlist.txt localhost http-post-form "/bruteforce.php:username=admin&password=^PASS^&submit=Login:Wrong Password"
