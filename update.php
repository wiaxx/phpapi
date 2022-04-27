<?php

if ($_SERVER["REQUEST_METHOD"] != "PUT") {
die("Invalid request");
}

require_once("./db.php");

$input_json = file_get_contents("php://input");

$input = json_decode($input_json, TRUE);

$query = "UPDATE cars SET `make` = ?, `model` = ? WHERE id = ?";

$stmt = mysqli_prepare($conn, $query);

$stmt->bind_param("ssi", $input["make"], $input["model"], $_GET["id"]);

$success = $stmt->execute();

header("Content-Type: application/json; charset=utf-8");

if ($success) {
echo json_encode("Car changed");

} else {
http_response_code(404);
echo json_encode("Car not found and is not changed.");
}