<?php
include_once "../db_conn.php";

$mysqli = new mysqli(HOSTNAME, USERNAME, PASSWORD, "rentalsregistry");

$result = $mysqli->query("SELECT * FROM rentals");

echo "<h3 id='returnheading'>Choose an item to return</h3>";
echo "<table>
<tr>
<th>No.</th>
<th>Rented item</th>
<th>Item type</th>
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
        if ($row['type'] == 'book') {
            echo "<td>Book</td>";
        } else if ($row['type'] == 'program') {
            echo "<td>Program</td>";
        } else if ($row['type'] == 'device') {
            echo "<td>Device</td>";
        } else {
            echo "<td>Other</td>";
        }
        echo "<td>" . $row['borrower'] . "</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "<td> <a href='return.php?id=". $row['id'] . "'>Return</a> </td>";
        echo "</tr>";
}}
echo "</table>";

$mysqli->close();
?>
<style>
	<?php include '../style.css'; ?>
</style>
<div class="a">
	<a href="../menu.html">Back</a>
</div>