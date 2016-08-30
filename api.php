<?php

require_once 'config.inc';
//hold the error msg
$error = '';

$method = $_SERVER['REQUEST_METHOD'];

// grab the URI
$request = $_SERVER['REQUEST_URI'];

// read the message if any
$input = json_decode(file_get_contents('php://input'),true);

//get the json fields for validation
$title = $input['title'];
$studio = $input['studio'];
$year = $input['year'];
$total = $input['total'];
$picture = $input['picture'];

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



//Sanatizing inputs before inserting data to the db
switch ($method) {
  case 'GET':
    $sql = "select * from movies".($key?" where id=$key":''); break;
  case 'PUT':
  if(!preg_match('/^[a-z0-9 .\-]+$/i', $title)){
      $error .="Only alphanumeric values are allowed for movie title";
      http_response_code(400);
      die($error);
    }
    if(!preg_match('/^[a-z0-9 .\-]+$/i', $studio)){
      $error .="Only alphanumeric values are allowed for studio name";
      http_response_code(400);
      die($error);
    }
    if(strlen($year) > 4){
      $error .= "Year must be less than 4 digits long";
      http_response_code(400);
      die($error);
    }
    if($year < 0 OR $total < 0){
      $error .= "Year and total box office cannot be a negative value";
      http_response_code(400);
    }
    if(!ctype_digit($year) OR !ctype_digit($total)){
      $error .= "Year and total box office values must only contain digits";
      http_response_code(400);
      die($error);
    }
    else{
          $sql = "update movies set $set where id=$key"; break;
    }
  case 'POST':
    if(!preg_match('/^[a-z0-9 .\-]+$/i', $title)){
      $error .="Only alphanumeric values are allowed for movie title";
      http_response_code(400);
      die($error);
    }
    if(!preg_match('/^[a-z0-9 .\-]+$/i', $studio)){
      $error .="Only alphanumeric values are allowed for studio name";
      http_response_code(400);
      die($error);
    }
    if(strlen($year) > 4){
      $error .= "Year must be less than 4 digits long";
      http_response_code(400);
      die($error);
    }
    if($year < 0 OR $total < 0){
      $error .= "Year and total box office cannot be a negative value";
      http_response_code(400);
    }
    if(!ctype_digit($year) OR !ctype_digit($total)){
      $error .= "Year and total box office values must only contain digits";
      http_response_code(400);
      die($error);
    }
    else{
        $sql = "insert into movies set $set"; break;
    }
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
