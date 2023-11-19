<?php
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