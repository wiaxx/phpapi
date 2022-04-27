<?php
require_once('db_credentials.php');

// create connection to db
$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

// $db = create_db($conn);
// $table = create_table($conn);

function db_escape($connection, $string) {
    return mysqli_real_escape_string($connection, $string);
}