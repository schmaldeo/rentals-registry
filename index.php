<?php

$filename = 'db_conn.php';
if(!file_exists($filename)) {
    header('Location: ./setup.html');
} else {
    header('Location: ./menu.html');
}
?>