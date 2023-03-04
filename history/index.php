<?php
include_once "../db_conn.php";

$mysqli = new mysqli(HOSTNAME, USERNAME, PASSWORD, "rentalsregistry");
$result = $mysqli->query("SELECT * FROM rentals");

echo "<h3>History</h3>";

echo "<table>
<tr>
<th>ID</th>
<th>Rented item</th>
<th>Item type</th>
<th>Borrower</th>
<th>Date of loan</th>
<th>Returned</th>
<th>Date of return</th>
<th>Receiver</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['item'] . "</td>";
if($row['type']){
	if ($row['type'] == "book") {
		echo "<td>Book</td>";
	} else if ($row['type'] == "program") {
		echo "<td>Program</td>";
	} else if ($row['type'] == "device") {
		echo "<td>Device</td>";
	} else {
		echo "<td>Other</td>";
	}
};
echo "<td>" . $row['borrower'] . "</td>";
echo "<td>" . $row['date'] . "</td>";
if ($row['returned'] == 1) {
	echo "<td>Yes</td>";
} else {
	echo "<td>No</td>";
}
echo "<td>" . $row['returndate'] . "</td>";
echo "<td>" . $row['receiver'] . "</td>";
echo "</tr>";
}
echo "</table>";

$mysqli->close();
?>
<style>
	<?php include '../style.css'; ?>
</style>
<div class="a">
	<a href="../menu.html">Back</a>
</div>



<form action="export.php" method="POST">
	<div id="btn">
		<button type="submit" name="export">Export to .csv</button>
	</div>
</form>
