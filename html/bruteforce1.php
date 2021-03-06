<html lang="en">
    <head>
        <title> Masters of Deception</title>
	    <link rel="stylesheet" href="style.css">
    </head>
    <body>
		<div class="Banner">
			<img src="hacker-banner.jpg" width="100%" height="100">
			<div class="Title"><h1>Masters Of Deception CtF</h1></div>
		</div>
		<div class="Navbar">
			<ul>
				<li><a href="index.html">Home</a></li>
				<li><a href="challenges.html">Challenges</a></li>
				<li><a href="information.html">Information</a></li>
			</ul>
		</div>
		<div class="Text">
			<h2>Challenge 2</h2>
			<p>Crack the Username and Password</p>
      <br>
      <button type="button" class="collapsible">Hint</button>
      <div class="content">
      <p>Use a brute force attack <a href=""></a></p>
      </div>
  <form method="POST">
  <p><span style="width:180px">Username: </span><input type="text" name="username" id='un'></p>
  <p><span style="width:180px">Password: </span><input type="password" name="password" id='pw'></p>
  <input type="submit" name="submit" id="sub">
  </form>
  </div>
  </body>
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
         echo '<span style="color:#000">ERROR</span>';
   }
?>

<!-- .\hydra.exe -l admin -P .\passlist.txt localhost http-post-form "/bruteforce.php:username=admin&password=^PASS^&submit=Submit:Error"
