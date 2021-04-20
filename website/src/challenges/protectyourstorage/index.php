<html>
	<head>
		<title>Masters of Deception</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="/assets/css/main.css" />
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
				      <iframe src="https://www.youtube.com/embed/qELSSAspRDI?controls=0&showinfo=0&rel=0&autoplay=1&loop=1" frameborder="0" allowfullscreen></iframe>
				    </div>
				  </div>

				<!-- Intro -->
					<section id="intro" class="wrapper style1 fullscreen fade-up">
						<div class="inner">
							<h2>Protect your storage</h2>
							<p4>
									Try to find the correct login credentials in the database.
							</p4>
							<button type="button" class="collapsible">Hint</button>
							<div class="content">
							<p4>1. try using nmap port scan<br></p4>
							<p5>2. the given credentials are username:beeste_bende and password:ikhouvantennisballen<br></p5>
							<p6>3. What kind of hashes exist? Maybe you could use that...</p6>
							</div>
						</div>
					<form method="post" action="" onsubmit="return checkform();">
							<div class="input_bar">
								<input type="text" name="Username" id="un" placeholder="Username" />
								<input type="password" name="Password" id="pw" placeholder="Password" required/>
							</div>
									<br />
									<input type="submit" value="Login" class="primary" />
							</div>
						</div>
					</form>
					</section>
			 <script language="javascript">
				var coll = document.getElementsByClassName('collapsible');
				var i;
				for (i = 0; i < coll.length; i++) {
					coll[i].addEventListener('click', function () {
						this.classList.toggle('active');
						var _0x45eax3 = this.nextElementSibling;
						if (_0x45eax3.style.display === 'block') {
							_0x45eax3.style.display = 'none'
						} else {
							_0x45eax3.style.display = 'block'
						}
					})
				};

				function checkform() {
					if (document.getElementById('un').value == 'harry_hond' && document.getElementById('pw').value == 'woef_woef') {
						alert('Congratulations Protect your storage Challenge Completed!');
						setTimeout(function () {
							window.location = '/challenges'
						})
					} else {
						alert('Wrong Combination')
					}
				}
			</script>

			<script src="/assets/js/jquery.min.js"></script>
			<script src="/assets/js/jquery.scrollex.min.js"></script>
			<script src="/assets/js/jquery.scrolly.min.js"></script>
			<script src="/assets/js/browser.min.js"></script>
			<script src="/assets/js/breakpoints.min.js"></script>
			<script src="/assets/js/util.js"></script>
			<script src="/assets/js/main.js"></script>


	</body>
</html>
