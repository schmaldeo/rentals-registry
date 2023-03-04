<?php
if (isset($_POST['hostname']) && isset($_POST['username'])) {
    function validate($data) {
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
        $file = fopen('db_details.json', 'w') or die ('Cannot open the file');
        class ArrayValue implements JsonSerializable {
          public function __construct(array $array) {
            $this->array = $array;
          }
  
          public function jsonSerialize() {
            return $this->array;
          }
        }

        $array = ['hostname' => $hostname, 'username' => $username, 'password' => $password];
        
        $txt = json_encode(new ArrayValue($array));
        fwrite($file, $txt);
        fclose($file);
//        header('Location: ./dbsetup.php?hname='.$hostname.'&uname='.$username.'&pw='.$password);
    }
}