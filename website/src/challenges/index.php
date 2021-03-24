<?php

session_start();

?>
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
							<li><a href="/">Home</a></li>
							<li><a href="">Challenges</a></li>
							<li><a href="/whatwedo.html">What we do</a></li>
							<li><a href="/contact.html">Contact</a></li>
						</ul>
					</nav>
				</div>
			</section>

		<!-- Wrapper -->
			<div id="wrapper">
				<div class="video-background">
				    <div class="video-foreground">
				      <iframe src="https://www.youtube.com/embed/RR2EI8EEOOw?controls=0&showinfo=0&rel=0&autoplay=1&loop=1&mute=1" frameborder="0" allowfullscreen></iframe>
				    </div>
				  </div>

				<!-- Intro -->
					<section id="intro" class="wrapper style1 fullscreen fade-up">
						<div class="inner">
							<h1>CtF Challenges | PHPDemo: <?= isset($_SESSION['uid']) ? ' UID: ' . $_SESSION['uid'] : ' (Not logged in)' ?></h1>
							<p4>This page shows all the challenges of our Capture the Flag. You have to create a account to be able to complete these challenges.
								Our back end will manage your process and will show you how long you needed to complete the challenge. This will not be shared with other users.
								Only the time that's needed to complete the challenge for the first time will be recorded, we don't want to endurage speed runs. We want people to learn about our topic.
								It's only possible to enter the next challenge after you completed the one before that, this is because we want to learn people step by step about broken Authentication.
								And to be sure that you as a user don't get overwhelmed by the more difficult challenges. We have our challenges split up in 3 levels of difficulty, easy average and hard.
							We will also use humor in our challenges, don't feel personally attacked by it, we are just joking. Now with all the boring stuff out of the way let's start some challenges.</p4>
						</div>
					</section>

					<section id="two" class="wrapper style3 fade-up">
						<div class="inner">

							<h2>Easy Challenges</h2>
							<p>These challenges are ranked easy and require no external programs or siginificant amounts of knowledge.</p>
							<div class="features">
								<section>
									<h3>Inspect Element</h3>
									<p>Not a save way to store your password.</p>
									<button class="accordion">Intel</button>
									<div class="panel" style="display: none;">
										<p>A webpage is collection of text sorted in the form of elements or tags. These tags let’s the web browser know what is what on the page. In combination with webstyling we get the design of webpages. But it is possible for anybody visiting the website to inspect these elements that make up the webpage (also a good way to learn how something is built in your favorite website). If the developer puts sensitive data in these elements anybody can see them. You might think that encrypting this data is the solution but it’s not. There are a lot of free decrypting tools available online. </p>
									</div>
									<ul class="actions"><a href="inspectelement/inspectelement.html" class="button">Start</a></ul>
								</section>
								<section>
									<h3>You are not my boss (IN DEVELOPMENT)</h3>
									<p>Client in control instead of the server.</p>
									<button class="accordion">Intel</button>
									<div class="panel" style="display: none;">
										<p>Most applications are server and client based, website for instance always have your browser as client and the server that runs the website. In theory this means that the server is in control of what the client can see or do. But a lot of starting developers don’t know how to implement this correctly. This of course gives great risk in our online lives, for example imagine that you could type into your bank account how much money is on there. For this challenge you would have to successfully login into the webpage. Let’s start the challenge.</p>
									</div>
									<ul class="actions"><a href="generic.html" class="button">Start</a></ul>
								</section>
								<section>
									<h3>find the source (NOT WORKING)</h3>
									<p>Source code exploits</p>
									<button class="accordion">Intel</button>
									<div class="panel" style="display: none;">
										<p>A lot of manufacturers have built in usernames and passwords, some examples are firmware, hardware, applications, or online tools. Think of your router it comes with a standard username and password for you to use to set up your home network. These kinds of exploits can also happen within the source code of programs. What is source code you might ask? A summary: Source code is the version of software as it is originally written by a human in plain text. Find out more ad<a href="https://en.wikipedia.org/wiki/Source_code">Sourcecode wikipedia</p>
									</div>
									<ul class="actions"><a href="generic.html" class="button">Start</a></ul>
								</section>
							</div>
						</div>
					</section>

					<section id="two" class="wrapper style3 fade-up">
						<div class="inner">
							<h2>Medium Challenges</h2>
							<p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus, lacus eget hendrerit bibendum, urna est aliquam sem, sit amet imperdiet est velit quis lorem.</p>
							<div class="features">
								<section>
									<h4>Searching trough the dictionary</h4>
									<p>Bruteforce with lists</p>
									<button class="accordion">Intel</button>
									<div class="panel" style="display: none;">
										<p>The last challenge you had to guess the username and password, fine for a challenge but if you want to become the top cybercriminal you do not have time to do this. Unfortunately for us hackers have made tools to automate this process. So before we continue, ask yourself do I have a weak password or username? If yes change them, not after the challenge not tomorrow, no right now otherwise you will forget or postpone. Alright with that out of the way, let us explain how hackers use these tools. You saw that there are lists of most used usernames/passwords, hackers can write a program that try out every option by starting the program. Hackers can ad all the words from a dictionary to these programs, that is why words aren’t safe passwords. Now let’s try out such a list tool.</p>
									</div>
									<ul class="actions"><a href="bruteforce/bruteforce.php" class="button">Start</a></ul>
								</section>
								<section>
									<h3>Maybe not the best username/password</h3>
									<p>Bruteforce by hand</p>
									<button class="accordion">Intel</button>
									<div class="panel" style="display: none;">
										<p>The weakest link in cyber security will always be humans and their laziness. In 2020 83% of Americans used a not save password. What is a not save password you might ask? Let us give some examples. Passwords with less then 8 characters are not secure, any word found in a dictionary (English or foreign), date of birth, the name of your favorite band/pop icon. It is not only the average internet user that uses unsafe passwords, people that work in IT are also lazy (Admin is a regularly used username within IT systems). Finally, there are the well know lazy ones as 01234556789, abc123, Iloveyou, Dragon etc. Now let us start the guessing game.</p>
									</div>
									<ul class="actions"><a href="bruteforce2/bruteforce2.php" class="button">Start</a></ul>
								</section>
								<section>
									<h3>Protect your storage (IN DEVELOPMENT)</h3>
									<p>INPUT INTEL...</p>
									<ul class="actions"><a href="ProtectYourStorage/protectyourstorage.html" class="button">Start</a></ul>
								</section>
							</div>
						</div>
					</section>

					<section id="two" class="wrapper style3 fade-up">
						<div class="inner">
							<h2>Hard Challenges</h2>
							<p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus, lacus eget hendrerit bibendum, urna est aliquam sem, sit amet imperdiet est velit quis lorem.</p>
							<div class="features">
								<section>
									<h3>Calculate the answer (NOT WORKING)</h3>
									<p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
									<ul class="actions"><a href="generic.html" class="button">Start</a></ul>
								</section>
								<section>
									<h3>Not random enough (NOT WORKING)</h3>
									<p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
									<ul class="actions"><a href="generic.html" class="button">Start</a></ul>
								</section>
								<section>
									<h3>Persistence is key (NOT WORKING)</h3>
									<p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
									<ul class="actions"><a href="generic.html" class="button">Start</a></ul>
								</section>
							</div>
						</div>
					</section>

			<script src="/assets/js/jquery.min.js"></script>
			<script src="/assets/js/jquery.scrollex.min.js"></script>
			<script src="/assets/js/jquery.scrolly.min.js"></script>
			<script src="/assets/js/browser.min.js"></script>
			<script src="/assets/js/breakpoints.min.js"></script>
			<script src="/assets/js/util.js"></script>
			<script src="/assets/js/main.js"></script>
			<script src="/assets/js/accordion.js"></script>
			<script>
				var acc = document.getElementsByClassName("accordion");
				var i;

				for (i = 0; i < acc.length; i++) {
					acc[i].addEventListener("click", function() {
						this.classList.toggle("active");
						var panel = this.nextElementSibling;
						if (panel.style.display === "block") {
							panel.style.display = "none";
						} else {
							panel.style.display = "block";
						}
					});
				}
			</script>
	</body>
</html>
