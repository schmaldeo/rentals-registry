<?php
if (isset($_POST['hostname']) && isset($_POST['username'])) {
  function validate($data): string
  {
    $data = trim($data);
    $data = stripslashes($data);
    return htmlspecialchars($data);
  }

  $hostname = validate($_POST['hostname']);
  $username = validate($_POST['username']);
  $password = $_POST['pass'];

  if (empty($hostname) || empty($username)) {
    die("One or more required fields were empty");
  } else {
    $file = fopen('db_conn.php', 'w') or die ('Cannot open the file');
    $txt = "<?php
          const HOSTNAME = \"$hostname\";
          const USERNAME = \"$username\";
          const PASSWORD = \"$password\";
        ";

    fwrite($file, $txt);
    fclose($file);
    header('Location: ./dbsetup.php');
  }
}