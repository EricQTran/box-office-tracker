
<?php
header('Content-Type: text/html'); 
echo "<html><head><title>Hello World</title>";
$num = rand(0, 2);
$color = white;
if($num == 0){
	$color = red;
}
elseif($num == 1){
	$color = blue;
}else{
$color = white;
}
echo "</head><body bgcolor =$color><h1>";

echo "Hello from PHP the time date is " .date("Y-m-d h:i:sa");


echo"</body></html>";
?>

