<?php
  function connectDB(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "daw_bd";

    $con = mysqli_connect($servername, $username, $password, $dbname);

    if(!$con){
      die("Connection failed: " . mysqli_connect_error());
    }
    return $con;
  }

  function closeDB($mysql){
    mysqli_close($mysql);
  }

  function getFruits(){
    $conn = connectDB();
    $sql = "SELECT name, units, quantity, price, country FROM Fruit";
    $result = mysqli_query($conn,$sql);
    closeDB($conn);
    return $result;
  }

  function getFruitsByName($fruit_name){
    $conn = connectDB();
    $sql = "SELECT name, units, quantity, price, country FROM Fruit WHERE NAME LIKE '%".$fruit_name."%'";
    $result = mysqli_query($conn,$sql);
    closeDB($conn);
    return $result;
  }

  function getCheapestFruits($cheap_price){
    $conn = connectDB();
    $sql = "SELECT name, units, quantity, price, country FROM Fruit WHERE price <=".$cheap_price;
    $result = mysqli_query($conn,$sql);
    closeDB($conn);
    return $result;
  }

  function getFruitsByCountry($country){
    $conn = connectDB();
    $sql = "SELECT name, units, quantity, price, country FROM Fruit WHERE country LIKE '%".$country."%'";
    $result = mysqli_query($conn,$sql);
    closeDB($conn);
    return $result;
  }

  function getFruitsByUnits($units){
    $conn = connectDB();
    $sql = "SELECT name, units, quantity, price, country FROM Fruit WHERE units >= ".$units;
    $result = mysqli_query($conn,$sql);
    closeDB($conn);
    return $result;
  }

?>
