<?php

if($_SERVER["REQUEST_METHOD" != "GET"]){
    die("Invalid request");
}

require_once "./db.php";

$query = "DELETE FROM cars WHERE id = ?"; //skapar vår query

$stmt = mysqli_prepare($conn, $query); //statement för att kunna stoppa in parametrar
$stmt->bind_param("i", $_GET["id"]); //stoppar in parametrar

$success = $stmt->execute(); //kör den så att parametrarna läggs in, samt kör vår query(argumentet) mot db
header("Content-Type: application/json; charset=utf-8");

if($success){
    echo json_encode("Deleted!");
}else{
    echo json_encode($conn);
}