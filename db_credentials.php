<?php

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'carhusen');

function create_db($conn)
{
    $sql = "CREATE DATABASE if not exists carhusen";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        return exit("Create database query failed");
    }
}

function create_table($conn) {
    $sql = "CREATE TABLE if not exists cars (";
    $sql .= "id int(2) AUTO_INCREMENT PRIMARY KEY,";
    $sql .= "make varchar(20) NOT NULL,";
    $sql .= "model varchar(10) NOT NULL)";
    // echo $sql;
    $result = mysqli_query($conn, $sql);
    if ($result) {
        return "Table created!";
    } else {
        return exit('Error creating table');
    }
}