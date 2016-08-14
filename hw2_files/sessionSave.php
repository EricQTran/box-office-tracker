<?php

session_start();

$_SESSION["username"] = $_GET["username"];

header('Content-Type: text/html'); 
echo "<html><head><title>Form Echo</title>";

echo "</head><body><h1>";

$name= $_SESSION["username"];
echo "Session was saved! Username was $name ";

echo "</h1>";

echo"</body></html>";

?>