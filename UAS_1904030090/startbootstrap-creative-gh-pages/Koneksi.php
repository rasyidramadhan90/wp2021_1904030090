<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'uas_1904030090';

$conn = mysqli_connect($host, $user, $pass, $db);

$result = mysqli_query($conn, 'SELECT * FROM tabel_anggota');


?> 