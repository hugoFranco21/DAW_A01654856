<?php

  function connectDB(){
    $servername = "localhost";
    $username = "hugofranco21";
    $password = "";
    $dbname = "examen2";

    $con = new mysqli($servername, $username, $password, $dbname);

    if($con->connect_error){
      die("Connection failed: " . $con->connection_error);
    }
    return $con;
  }

  function closeDB($mysql){
    $mysql->close();
  }

  function getIncidents(){
    $conn = connectDB();
    $query="SELECT fecha_hora, nombre, denominacion FROM Incidentes";
    $result = mysqli_query($conn, $query);
    closeDB($conn);
    return $result;
  }

  function getLugares(){
    $conn = connectDB();
    $query="SELECT nombre FROM Lugar";
    $result = mysqli_query($conn, $query);
    closeDB($conn);
    return $result;
  }

  function getTipos(){
    $conn = connectDB();
    $query="SELECT denominacion FROM Tipo";
    $result = mysqli_query($conn, $query);
    closeDB($conn);
    return $result;
  }

  function insertarIncidente($nombre,$den){
    $conn = connectDB();
    $sql = "call RegistrarIncidente(".$nombre.",".$den.")";
    if(mysqli_query($conn,$sql)){
        closeDB($conn);
        return true;
    } else{
        closeDB($conn);
        return false;
    }
    closeDB($conn);
  }
  

?>
