<?php
$hname = 'localhost';
$uname = 'root';
$password = '';
$db_name = 'rentalsregistry';
$conn = mysqli_connect($hname, $uname, $password, $db_name);
if (!$conn) {
echo 'Connection failed!';
exit();
}