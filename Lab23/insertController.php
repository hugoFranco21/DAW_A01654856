<?php
  require_once('util.php');
  require_once('utils.php');
  $producto = htmlentities($_POST['producto']);
  $nombre = htmlentities($_POST['nombre_cliente']);
  $numero = htmlentities($_POST['numero']);
  $calle =htmlentities($_POST['calle']);
  $ciudad = htmlentities($_POST['ciudad']);
  $estado = htmlentities($_POST['estado']);
  $cp = htmlentities($_POST['cp']);
  $repartidor = htmlentities($_POST['nombre_repartidor']);
  if(strlen($producto) > 0 && strlen($nombre) > 0 && strlen($numero) > 0 && strlen($calle) > 0 && strlen($ciudad) > 0 && strlen($estado) > 0 && strlen($cp) == 5 && strlen($repartidor) > 0){
    if(insertEnt($producto, $nombre, $numero, $calle, $ciudad, $estado, $cp, $repartidor)){
      echo '<script>alert("La inserción se realizó exitosamente")</script>';
    } else{
      echo '<script>alert("La inserción no se pudo realizar")</script>';
    }
  } else {
      echo '<script>alert("La inserción no se pudo realizar")</script>';
  }

?>
