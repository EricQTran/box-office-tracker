<?php

session_start();

$_SESSION["name"] = $_GET["username"];

$name = $_SESSION["name"];

print "Username: " .$name . " was saved!\n<br>";

print "<a href='sessionpage2.php'>Link to page 2</a>";

?>
