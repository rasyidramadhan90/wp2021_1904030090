<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'websmpt5';

$conn = mysqli_connect($host, $user, $pass, $db);

$result = mysqli_query($conn, 'SELECT * FROM calon_mhs');


?> 