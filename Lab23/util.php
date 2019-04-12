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
    $con->set_charset("utf8");
    return $con;
  }

  function closeDB($mysql){
    $mysql->close();
  }

  function getEntregas(){
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

  function insertEnt($producto, $cliente, $numero, $calle, $ciudad, $estado, $cp, $repartidor){
    $conn = connectDB();
    $sql = "INSERT INTO entregas (producto, nombre_cliente, numero_calle, calle, ciudad, estado, postal, nombre_repartidor) VALUES(?,?,?,?,?,?,?,?)";

    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('ssssssis',$producto, $cliente, $numero, $calle, $ciudad, $estado, $cp, $repartidor);
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
