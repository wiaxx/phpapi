<?php
require_once('../db.php');

if ($_SERVER['REQUEST_METHOD'] != 'GET') {
    die('Invalid request method');
}

$sql = "SELECT * FROM cars";
$result = mysqli_query($conn, $sql) or die('Select query failed.');
$cars = mysqli_fetch_all($result, MYSQLI_ASSOC);

header('Content-Type: application/json');

if (!$cars) {
    echo "No cars found";
} else {
    echo json_encode($cars);
}
