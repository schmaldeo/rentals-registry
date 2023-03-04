<?php
if (isset($_POST['export'])) {
  include "../db_conn.php";

  header('Content-Type: text/csv; charset=utf-8');
  header('Content-Disposition: attachment; filename=info.csv');
  $output = fopen('php://output', 'w');
  fputcsv($output, array('ID', 'Rented item', 'Borrower', 'Date of loan', 'Returned', 'Date of return', 'Receiver', 'Type'));

  $mysqli = new mysqli(HOSTNAME, USERNAME, PASSWORD, "rentalsregistry");
  $result = $mysqli->query("SELECT * FROM rentals ORDER BY id");

  $query = 'SELECT * FROM rentals ORDER BY id';

  while ($row = mysqli_fetch_assoc($result)) {
    fputcsv($output, $row);
  }
  fclose($output);
}