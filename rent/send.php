<?php  
include('../db_conn.php');

if (isset($_POST['item']) && isset($_POST['borrower']) && isset($_POST['date']) && isset($_POST['type'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$item = validate($_POST['item']);
	$borrower = validate($_POST['borrower']);
    $date = validate($_POST['date']);
	$type = validate($_POST['type']);

	if (empty($item) || empty($borrower) || empty($date) || empty($type)) {
		echo "One or more fields were empty";
	}else {

		$sql = "INSERT INTO info(item, borrower, date, type) VALUES('$item', '$borrower', '$date', '$type')";
		$res = mysqli_query($conn, $sql);

		if ($res) {
			mysqli_close($conn); 
        	header("location:index.html"); 
        	exit;
		}else {
			echo "Cannot send the information";
		}
	}

}else {
	echo("There has been an error");
}
?>
