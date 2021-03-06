<!DOCTYPE html>
<html>
   <head>
      <title>Login</title>
   </head>
   <body>
      <div id="main">
         <h1>SIMPLE LOGIN</h1>
         <form method="POST">
            Username <input type="text" name="username" class="text" autocomplete="off">
            Password <input type="password" name="password" class="text">
            <input type="submit" name="submit" id="sub">
         </form>
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
         echo "Error";
   }
?>   

<!-- .\hydra.exe -l admin -P .\passlist.txt localhost http-post-form "/bruteforce2.php:username=admin&password=^PASS^&submit=Submit:Error"
