<?php
include('../db_conn.php');

$result = mysqli_query($conn,"SELECT * FROM info");

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Rented item</th>
<th>Borrower</th>
<th>Date of loan</th>
<th>Return</th>
</tr>";


while($row = mysqli_fetch_array($result))
{
    if($row['returned'] == 1) {
        continue;
    } else {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['item'] . "</td>";
        echo "<td>" . $row['borrower'] . "</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "<td> <a href='return.php?id=". $row['id'] . "'>Return</a> </td>";
        echo "</tr>";
}}
echo "</table>";

if (!$result) {
    printf(mysqli_error($conn));
    exit();
}

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