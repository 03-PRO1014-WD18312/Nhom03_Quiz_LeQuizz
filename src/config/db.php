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

  function pdo_execute($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try {
      $conn = pdo_get_connection();
      $stmt = $conn -> prepare($sql);
      $stmt->execute($sql_args);
    } 
    catch (PDOException $e) {
      throw $e;
    }
    finally {
      unset($conn);
    }
  }

  function pdo_query($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try {
      $conn = pdo_get_connection();
      $stmt = $conn -> prepare($sql);
      $stmt -> execute($sql_args);
      $row = $stmt -> fetchAll();
      return $row;
    } 
    catch (PDOException $th) {
      throw $th;
    }
    finally {
      unset($conn);
    }
  }

  function pdo_query_one($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try {
      $conn = pdo_get_connection();
      $stmt = $conn -> prepare($sql);
      $stmt->execute($sql_args);
      $row = $stmt -> fetch(PDO::FETCH_ASSOC);
      return $row;
    } 
    catch (PDOException $th) {
      throw $th;
    }
    finally {
      unset($conn);
    }
  }

  function pdo_query_value($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try {
      $conn = pdo_get_connection();
      $stmt = $conn -> prepare($sql);
      $stmt -> execute($sql_args);
      $row = $stmt -> fetch(PDO::FETCH_ASSOC);
      return array_values($row)[0];
    } 
    catch (PDOException $th) {
      throw $th;
    }
    finally {
      unset($conn);
    }
  }
?>