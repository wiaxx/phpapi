<?php

if ($_SERVER["REQUEST_METHOD"] != "PUT") {
die("Invalid request");
}

require_once("./db.php");

$input_json = file_get_contents("php://input"); //hämtar bodyn
$input = json_decode($input_json, TRUE); //gör om till ett objekt, associativt
$query = "UPDATE cars SET `make` = ?, `model` = ? WHERE id = ?"; //skapar vår query

$stmt = mysqli_prepare($conn, $query); //statement för att kunna stoppa in parametrar
$stmt->bind_param("ssi", $input["make"], $input["model"], $_GET["id"]); //stoppar in parametrar

$success = $stmt->execute(); //kör den så att parametrarna läggs in, samt kör vår query(argumentet) mot db
header("Content-Type: application/json; charset=utf-8");

if($success){
    echo json_encode("Update complete!");
}else{
    echo json_encode($stmt->errno);
}