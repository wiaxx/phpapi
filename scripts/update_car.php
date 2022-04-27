<?php
require_once('../db.php');

if ($_SERVER['REQUEST_METHOD'] != 'PUT') {
    die('Invalid request method');
}

$input = json_decode(file_get_contents('php://input'), TRUE);

$sql = "UPDATE cars 
        SET make = ?, model = ? 
        WHERE id = ?";

$stmt = mysqli_prepare($conn, $sql);
$stmt->bind_param('ssi', $input['make'], $input['model'], $_GET['id']);
$success = $stmt->execute();

if ($success) {
    http_response_code(200);
    echo json_encode('Updated');
} else {
    // Insert failed
    http_response_code(500);
    echo mysqli_error($conn);
    exit;
}