<?php
include_once "../db_conn.php";

if (isset($_POST['item']) && isset($_POST['borrower']) && isset($_POST['date']) && isset($_POST['type'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   return htmlspecialchars($data);
	}

	$item = validate($_POST['item']);
	$borrower = validate($_POST['borrower']);
    $date = validate($_POST['date']);
	$type = validate($_POST['type']);

	if (empty($item) || empty($borrower) || empty($date) || empty($type)) {
		echo "One or more fields were empty";
	} else {
        $mysqli = new mysqli(HOSTNAME, USERNAME, PASSWORD, "rentalsregistry");
      
        $mysqli->query("INSERT INTO rentals (item, borrower, date, type) VALUES ('$item', '$borrower', '$date', '$type')");

        $mysqli->close();
        
        header("Location:index.html"); 
	}

} else {
	echo("There has been an error");
}
