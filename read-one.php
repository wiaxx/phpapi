<?php

if($_SERVER["REQUEST_METHOD" != "GET"]){
    die("Invalid request");
}

require_once "./db.php";

$query = "SELECT * FROM cars WHERE id = ?"; //skapar vår query
$stmt = mysqli_prepare($conn, $query); //statement för att kunna stoppa in parametrar
$stmt->bind_param("i", $_GET["id"]); //stoppar in parametrar

$stmt->execute(); //kör den så att parametrarna läggs in, samt kör vår query(argumentet) mot db
$result = $stmt->get_result(); //resultat hämtas och sparas i vårt STATEMENT
$car = mysqli_fetch_assoc($result); //hämta resultatet som en associativ array och lägger i variabeln car

header("Content-Type: application/json; charset=utf-8");

if($car){
    echo json_encode($car);
}else{
    http_response_code(404);
    echo json_encode("Not found");
}