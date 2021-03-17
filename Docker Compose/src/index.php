<?php

echo "Hello from the docker yooooo container";

$mysqli = new mysqli("db", "root", "ssd", "TEST");

$sql = 'SELECT * FROM bruteforce';
$result = $mysqli->query($sql);

?>
