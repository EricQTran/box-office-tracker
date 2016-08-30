<?php

require_once 'config.inc';
//hold the error msg
$error = '';

$method = $_SERVER['REQUEST_METHOD'];

// grab the URI
$request = $_SERVER['REQUEST_URI'];

// read the message if any
$input = json_decode(file_get_contents('php://input'),true);

$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));

$key = array_shift($request)+0;


$columns = preg_replace('/[^a-z0-9_]+/i','',array_keys($input));
$values = array_map(function ($value) use ($conn) {
  if ($value===null) return null;
  return mysqli_real_escape_string($conn,(string)$value);
},array_values($input));
 
// build the SET part of the SQL command
$set = '';
for ($i=0;$i<count($columns);$i++) {
  $set.=($i>0?',':'').'`'.$columns[$i].'`=';
  $set.=($values[$i]===null?'NULL':'"'.$values[$i].'"');
}
 
 


switch ($method) {
  case 'GET':
    $sql = "select * from movies".($key?" where id=$key":''); break;
  case 'PUT':
    $sql = "update movies set $set where id=$key"; break;
  case 'POST':
  if(!ctype_alnum($_POST['movie_title'])){
    $error = '<p class="error">Movie Titles can only contain alphanumeric values</p>';
  }
    $sql = "insert into movies set $set"; break;
  case 'DELETE':
    $sql = "delete from movies where id=$key"; break;
}
$result = mysqli_query($conn, $sql);

if (!$result) {
  http_response_code(404);
  die("Query failed: " . mysqli_connect_error());
 }


// print results, insert id or affected row count


//echo json_encode(mysqli_fetch_object($result));


if ($method == 'GET') {
  if (!$key) echo '[';
  for ($i=0;$i<mysqli_num_rows($result);$i++) {
    echo ($i>0?',':'').json_encode(mysqli_fetch_object($result));
  }
  if (!$key) echo ']';
} elseif ($method == 'POST') {
  echo mysqli_insert_id($conn);
} else {
  echo mysqli_affected_rows($conn);
}
 


// close mysql connection
mysqli_close($conn);

 
?>
