<?php
function pdo_get_connection(){
    $dburl = "mysql:host=localhost;dbname=factory;charset=utf8mb4";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO($dburl, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        // Handle connection errors here
        throw $e;
    }
  }
  ?>