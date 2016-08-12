
<?php
header('Content-Type: text/html'); 
echo "<html><head><title>Environment Variables</title>";

echo "</head><body align='center'>";

foreach ($_ENV as $name => $ky) {
	echo "<p>$name : ".$ky. "</p><br>";
}



echo"</body></html>";
?>