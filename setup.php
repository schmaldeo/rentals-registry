<?php
if (isset($_POST['hostname']) && isset($_POST['username'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $hostname = validate($_POST['hostname']);
    $username = validate($_POST['username']);
    $password = $_POST['pass'];

    if (empty($hostname) || empty($username)) {
        echo "One or more required fields were empty";
    } else {          
        $file = fopen('db_conn.php', 'w') or die ('Cannot open the file');
        $txt = "<?php\n\$hname = '$hostname';\n\$uname = '$username';\n\$password = '$password';\n\$conn = mysqli_connect(\$hname, \$uname, \$password);\nif (!\$conn) {\necho 'Connection failed!';\nexit();\n}";
        fwrite($file, $txt);
        fclose($file);
        header('Location: ./dbsetup.php?hname='.$hostname.'&uname='.$username.'&pw='.$password);
    }

    
}
?>