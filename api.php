<?php

require_once 'config.inc';
  

$sql = "select * from movies";


$result = mysqli_query($conn, $sql);

if (!$result) {
  http_response_code(404);
  die("Query failed: " . mysqli_connect_error());
 }

// print results, insert id or affected row count
echo json_encode(mysqli_fetch_object($result));

/*if ($method == 'GET') {
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
 */


// close mysql connection
mysqli_close($conn);

 
?>
