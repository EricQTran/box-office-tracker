<?php
session_start();

session_destroy();

print "Session was destroyed!<br>";

print "<a href='../sessionpage1_php.html'>Return to page 1</a>";
?>
