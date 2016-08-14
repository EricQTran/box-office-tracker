
<?php
header('Content-Type: text/html');
echo "<html><head><title>Form Echo</title>";

$color=$_GET["cSelect"];


echo "</head><body bgcolor=$color><h1>";

$first=$_GET["firstname"];
$last=$_GET["lastname"];
$dtime= date("Y-m-d", time());
$theTime= time();
echo "Welcome $first $last from a Web app written in PHP on ".date("Y-m-d h:i:sa");

echo "</h1>";

echo"</body></html>";
?>

