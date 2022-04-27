<?php

if($_SERVER["REQUEST_METHOD" != "POST"]){
    die("Invalid request");
}

require_once "./db.php";

$input_json = file_get_contents("php://input"); //hämtar bodyn
$input = json_decode($input_json, TRUE); //gör om till ett objekt, associativt
$query = "INSERT INTO `cars` (`model`, `make`) VALUES (?, ?)";

$stmt = mysqli_prepare($conn, $query);
$stmt->bind_param("ss", $input["model"], $input["make"]); //koppla ihop frågetcknerna. s = string = model, s = string = make.
$success = $stmt->execute();
if($success){
    http_response_code(201);
    echo json_encode("Created");
}else {
    http_response_code(500);
    echo json_encode($stmt->errno);
}