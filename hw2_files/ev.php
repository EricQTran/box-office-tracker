
<?php
header('Content-Type: text/html'); 
echo "<html><head><title>Environment Variables</title>";

echo "</head><body align='center'>";
echo "<p>";

foreach ($_ENV as $name => $ky) {
	echo "$name : ".$ky. "<br>";
}

echo "</p>";
echo"</body></html>";
?>