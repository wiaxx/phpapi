<?php
require_once('../db.php');

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo die('Invalid method');
}

$input = json_decode(file_get_contents('php://input'), TRUE);

$sql = "INSERT INTO cars ";
$sql .= "(make, model) ";
$sql .= "VALUES (?, ?)";

$stmt = mysqli_prepare($conn, $sql);
$stmt->bind_param('ss', $input['make'], $input['model']);
$success = $stmt->execute();

if ($success) {
    http_response_code(200);
    echo json_encode('Created');
} else {
    // Insert failed
    http_response_code(500);
    echo mysqli_error($conn);
    exit;
}

/*

$sql = "INSERT INTO cars ";
$sql .= "(make, model) ";
$sql .= "VALUES (";
$sql .= "'" . db_escape($conn, $input['make']) . "',";
$sql .= "'" . db_escape($conn, $input['model']) . "'";
$sql .= ")";

$result = mysqli_query($conn, $sql);

OR

$sql = "INSERT INTO cars ";
$sql .= "(make, model) ";
$sql .= "VALUES (?, ?)";

$stmt = mysqli_prepare($conn, $sql);
$stmt->bind_param('ss', $input['make'], $input['model']);
$success = $stmt->execute();

header('Content-Type: application/json');
if($success) {
    http_response_code(200);
    echo json_encode('Created');
} else {
    http_response_code(500);
    echo json_encode($stmt->errno);
}
*/