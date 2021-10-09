<?php
include('./db_conn.php');

$sql = 'CREATE TABLE info(id int NOT NULL AUTO_INCREMENT, item text, borrower text, date date, returned tinyint(1), returndate date, receiver text, type text, PRIMARY KEY(id));';

$res = mysqli_query($conn, $sql);
if ($res) {
    mysqli_close($conn);
    header('Location: ./menu.html');
    exit;
} else {
    echo 'Cannot create a table';
}

?>