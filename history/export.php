<?php
if(isset($_POST['export'])) {
include('../db_conn.php');

$conn = mysqli_connect($sname, $uname, $password, $db_name);
if (!$conn) {
	echo "Connection failed!";
	exit();
}

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=info.csv');
$output = fopen('php://output', 'w');
fputcsv($output, array('ID', 'Rented item', 'Borrower', 'Date of loan', 'Returned', 'Date of return', 'Receiver', 'Type'));
$query = 'SELECT * FROM info ORDER BY id ASC';
$result = mysqli_query($conn, $query);
while($row=mysqli_fetch_assoc($result)) {
    fputcsv($output, $row);
}
fclose($output);
}
?>