<?php
include_once "./db_conn.php";

$mysqli = new mysqli(HOSTNAME, USERNAME, PASSWORD);

$mysqli->query('CREATE DATABASE rentalsregistry');

$mysqli->select_db('rentalsregistry');

$mysqli->query('CREATE TABLE rentals(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    item VARCHAR(50), 
    borrower VARCHAR(100), 
    date DATE, 
    returned BOOL, 
    returndate DATE, 
    receiver VARCHAR(100), 
    type VARCHAR(50));
');

$mysqli->close();

header('Location: ./menu.html');
