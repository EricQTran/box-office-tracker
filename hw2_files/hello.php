<!DOCTYPE html>
<html>
<head>
	<title>Hello World</title>

	<?php 

$num = rand(0, 2);
$color = white;
if($num == 0){
	$color = red;
}
elseif($num == 1){
	$color = blue;
}
?>
</head>
<body bgcolor="$color">
<h1>
<?php 

echo "Hello from PHP the time date is " .date("Y-m-d h:i:sa");

?>
</h1>
</body>
</html>