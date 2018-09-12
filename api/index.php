<?php
header('Content-Type: application/json');
$conn = mysqli_connect('localhost','root', '',  'data_bot');
//get the json key
$command  = $_POST['command'];
$table  = $_POST['table'];
$column  = $_POST['column'];

call_user_func_array($command, array($table, $column));
// create a function
function db($table){
  global $conn;

  $sql = "SELECT * FROM $table";
  $result = mysqli_query($conn,$sql);
  echo json_encode(mysqli_fetch_all($result, MYSQLI_ASSOC));
}
//table
function table($table, $column){
  global $conn;
  $sql = "SELECT * FROM $table where title = '$column'";
  $result = mysqli_query($conn,$sql);
  echo json_encode(mysqli_fetch_all($result, MYSQLI_ASSOC));
}
