<?php
require_once('../db.php');

if ($_SERVER['REQUEST_METHOD'] != 'GET') {
    die('Invalid request method');
}

$sql = "SELECT * FROM cars WHERE id = ?";

$stmt = mysqli_prepare($conn, $sql);
$stmt->bind_param('i', $_GET['id']);
$stmt->execute();
$result = $stmt->get_result();
$car = mysqli_fetch_assoc($result);

header('Content-Type: application/json');

if ($car) {
    echo json_encode($car);
} else {
    http_response_code(404);
    echo json_encode("No car found");
}

/*

$sql = "SELECT * FROM cars ";
$sql = "WHERE id='" . $input['id'] . "'";
$result = mysqli_query($conn, $sql) or die('Select query failed.');
$cars = mysqli_fetch_all($result, MYSQLI_ASSOC);

*/