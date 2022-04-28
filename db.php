<?php

$mysql_host = "localhost"; // våran host
$mysql_user = "root";   // inlogg till mySQL
$mysql_pass = "root"; // lösen till mySQL- kanske inte behövs ($mysql_pass = "root";)
$mysql_db = "phpapi"; // namn på db i mySQL

$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db); //connection mellan allt

//$conn blir false om anslutningen misslyckas
if (!$conn){
die("Connection failed");
}