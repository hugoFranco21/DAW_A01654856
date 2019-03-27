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

  function insertFruit($name, $units, $quantity, $price, $country){
    $conn = connectDB();
    $sql = "INSERT INTO Fruit (Name, Units, Quantity, Price, Country) VALUES('".$name."', '".$units."','".$quantity."','".$price."','".$country."')";
    if(mysqli_query($conn, $sql)){
      echo "New record created successfully";
      closeDB($conn);
      return true;
    } else{
      echo 'Error: ' . $sql . "<br/>" . mysqli_error($conn);
      closeDB($conn);
      return false;
    }
    closeDB($conn);
  }

  function delete_by_name($name){
    $conn = connectDB();
    $sql = "DELETE FROM Fruit Where name ='".$name."'";
    $result = mysqli_query($conn,$sql);
    closeDB($conn);
    return $result;
  }

  function update_by_name($name, $units, $quantity, $price, $country){
    $conn = connectDB();
    $sql = "UPDATE Fruit SET name='".$name."', units=".$units.", quantity=".$quantity.", price=".$price.",country='".$country."' WHERE name='".$name."'";
    $result = mysqli_query($conn,$sql);
    closeDB($conn);
    return $result;
  }



?>
