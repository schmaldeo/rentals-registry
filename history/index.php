<?php
include('../db_conn.php');

$result = mysqli_query($conn,"SELECT * FROM info");

echo "<table>
<tr>
<th>ID</th>
<th>Rented item</th>
<th>Borrower</th>
<th>Date of loan</th>
<th>Returned</th>
<th>Date of return</th>
<th>Receiver</th>
<th>Type</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['item'] . "</td>";
echo "<td>" . $row['borrower'] . "</td>";
echo "<td>" . $row['date'] . "</td>";
if ($row['returned'] == 0) {
	echo "<td>No</td>";
} else {
	echo "<td>Yes</td>";
}
echo "<td>" . $row['returndate'] . "</td>";
echo "<td>" . $row['receiver'] . "</td>";
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
echo "</tr>";
}
echo "</table>";

mysqli_close($conn);
?>
<style>
	<?php include '../style.css'; ?>
</style>
<div id="anchors">
	<div class="a">
		<a href="/">Back</a>
	</div>
</div>


<form action="export.php" method="POST">
	<div id="btn">
		<button type="submit" name="export">Export to .csv</button>
	</div>
</form>
