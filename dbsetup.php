<?php
include('./db_conn.php');

$sql = 'CREATE DATABASE rentalsregistry';
$res = mysqli_query($conn, $sql);

$hostname = $_GET['hname'];
$username = $_GET['uname'];
$password = $_GET['pw'];

$file = fopen('db_conn.php', 'w') or die ('Cannot open the file');
$txt = "<?php\n\$hname = '$hostname';\n\$uname = '$username';\n\$password = '$password';\n\$db_name = 'rentalsregistry';\n\$conn = mysqli_connect(\$hname, \$uname, \$password, \$db_name);\nif (!\$conn) {\necho 'Connection failed!';\nexit();\n}";
fwrite($file, $txt);
fclose($file);
header('Location: ./dbsetup.php');  

mysqli_close($conn);
header('Location: ./sqlsetup.php');
exit;

?>