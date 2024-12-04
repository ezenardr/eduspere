<?php

function getConnection(){
    try {
        $conn_string = "mysql:host=localhost;dbname=edusphere;port=3306";
        return new PDO($conn_string, "root", "0606");
    }catch (PDOException $e){
        die ("Failed to reach the database: " . $e->getMessage());
    }
}
