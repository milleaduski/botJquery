<?php
header('Content-Type: application/json');
$conn = mysqli_connect('localhost','root', '',  'data_bot');
//get the json key
$command  = $_POST['command'];
$table  = $_POST['table'];

getTable($table);

// create a function
function getTable($table){
  global $conn;
  $sql = "SELECT * FROM $table";
  $result = mysqli_query($conn,$sql);
  echo json_encode(mysqli_fetch_all($result, MYSQLI_ASSOC));
}
