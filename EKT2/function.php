<?php
$conn = mysqli_connect('localhost','root','','websmpt5');

//pemanggilan tabel
function query($query)
{
  global $conn;

  //mengambil seluruh data pada tabel

  $result = mysqli_query($conn, $query);

  if(mysqli_num_rows($result) ==1){
    return mysqli_fetch_assoc($result);
  }
  //pemanggilan element data
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
  }
  return $rows;
}
