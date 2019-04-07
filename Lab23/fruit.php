<?php
  require_once('util.php');
  require_once('utils.php');
  $name = htmlentities($_POST['nameFruit']);
  $units = htmlentities($_POST['unitsFruit']);
  $quantity = htmlentities($_POST['quantityFruit']);
  $price =htmlentities($_POST['priceFruit']);
  $country = htmlentities($_POST['countryFruit']);
  if(strlen($name) > 0 && strlen($units) > 0 && strlen($quantity) > 0 && strlen($price) > 0 && strlen($country) > 0){
    if(is_numeric($quantity) && is_numeric($price)){
      if(insertfruit($name,$units,$quantity,$price,$country)){
        echo '<script>alert("La inserción se realizó exitosamente")</script>';
      } else{
        echo '<script>alert("La inserción no se pudo realizar")</script>';
      }
    } else {
      echo '<script>alert("La inserción no se pudo realizar")</script>';
    }
  } else {
    echo '<script>alert("La inserción no se pudo realizar")</script>';
  }

?>
