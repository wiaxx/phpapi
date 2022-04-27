<?php
require_once('../db.php');

if($_SERVER['REQUEST_METHOD'] != 'DELETE') {
    die('Invalid method');
}

$sql = "DELETE FROM cars WHERE id = ?";

$stmt = mysqli_prepare($conn, $sql);
$stmt->bind_param('i', $_GET['id']);
$success = $stmt->execute();

if ($success) {
    http_response_code(200);
    echo json_encode('Deleted!');
} else {
    http_response_code(500);
    echo mysqli_error($conn);
    exit;
}

/*

$sql = "DELETE FROM cars ";
$sql .= "WHERE id='" . db_escape($conn, $_GET['id']) . "'";

$result = mysqli_query($conn, $sql);

*/