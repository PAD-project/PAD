<h2>CHALLENGE 1 (MEDIUM):</h2>
<h3>Brute-force Attack (Dictionary) - Cracking the password.</h3>

In this challenge you must crack the password of the login form using a dictionary brute force attack. The brute-force attack tool you must use is called "Hydra". 

A link to the tool with documentation will be available on the challenge website. 
https://github.com/scrolls5/Hydra

In the HTML code you can find the command to start the brute-force attack.
<code>hydra.exe -l admin -P .\passlist.txt localhost http-post-form "/bruteforce.php:username=admin&password=^PASS^&submit=Login:Wrong Password"</code>

