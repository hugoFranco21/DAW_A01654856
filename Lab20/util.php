<?php
  function connectDB(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "daw_bd";

    $con = new mysqli($servername, $username, $password, $dbname);

    if($con->connect_error){
      die("Connection failed: " . $con->connection_error);
    }
    return $con;
  }

  function closeDB($mysql){
    $mysql->close();
  }

  function getFruits(){
    $conn = connectDB();
    $query="SELECT name, units, quantity, price, country FROM Fruit";
    if($stmt = $conn->prepare($query)){
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }
    closeDB($conn);
    return $result;
  }

  function getFruitName(){
    $conn = connectDB();
    $query="SELECT name FROM Fruit";
    if($stmt = $conn->prepare($query)){
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }
    closeDB($conn);
    $ar=array();
    $i=0;
    while($row = mysqli_fetch_assoc($result)){
      $ar[$i]=$row['name'];
      $i++;
    }
    //var_dump($ar);
    //die();
    return $ar;
    //return $result;
  }

  function getFruitsByName($fruit_name){
    $conn = connectDB();
    $sql = "SELECT name, units, quantity, price, country FROM Fruit WHERE NAME LIKE %?%";
    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('s',$fruit_name);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }
    closeDB($conn);
    return $result;
  }

  function getCheapestFruits($cheap_price){
    $conn = connectDB();
    $sql = "SELECT name, units, quantity, price, country FROM Fruit WHERE price <= ?";
    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('d',$fruit_name);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }
    closeDB($conn);
    return $result;
  }

  function getFruitsByCountry($country){
    $conn = connectDB();
    $sql = "SELECT name, units, quantity, price, country FROM Fruit WHERE country LIKE %?%";
    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('s',$country);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }
    closeDB($conn);
    return $result;
  }

  function getFruitsByUnits($units){
    $conn = connectDB();
    $sql = "SELECT name, units, quantity, price, country FROM Fruit WHERE units >= ?";
    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('i',$units);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }
    closeDB($conn);
    return $result;
  }

  function insertFruit($name, $units, $quantity, $price, $country){
    $conn = connectDB();
    //$sql = "INSERT INTO Fruit (Name, Units, Quantity, Price, Country) VALUES('".$name."', '".$units."','".$quantity."','".$price."','".$country."')";
    $sql = "INSERT INTO Fruit (Name, Units, Quantity, Price, Country) VALUES(?,?,?,?,?)";

    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('siids',$name,$units,$quantity,$price,$country);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
      closeDB($conn);
      return true;
    } else{
      closeDB($conn);
      return false;
    }
    closeDB($conn);
  }

  function delete_by_name($name){
    $conn = connectDB();
    $sql = "DELETE FROM Fruit Where name = ?";
    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('s',$name);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
      closeDB($conn);
      return true;
    } else{
      closeDB($conn);
      return false;
    }
    closeDB($conn);
  }

  function update_by_name($name, $units, $quantity, $price, $country){
    $conn = connectDB();
    //$sql = "UPDATE Fruit SET name=?, units=".$units.", quantity=".$quantity.", price=".$price.",country='".$country."' WHERE name='".$name."'";
    $sql = "UPDATE Fruit SET units=?, quantity=?, price=?,country=? WHERE name=?";
    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('iidss',$units,$quantity,$price,$country,$name);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
      closeDB($conn);
      return true;
    } else{
      closeDB($conn);
      return false;
    }
    closeDB($conn);
  }



?>
