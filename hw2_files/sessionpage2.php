<DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>Session 2 - PHP</title>
</head>

<body>

  <h1>Session Page 2 - PHP</h1>

  <?php
        session_start();
        $name = $_SESSION['name'];
        
	if(isset($_SESSION['name'])){
        print "Hi ". $name . " nice to meet you!";
	}
	else{
        print "howdy stranger... tell me your name on page 1!";
	} 
 ?>
  <br>
  <a href="destroySession.php" > Clear Session </a>
  <br>
  <a href="../sessionpage1_php.html"> Return to Page 1 </a>


</body>


</html>


