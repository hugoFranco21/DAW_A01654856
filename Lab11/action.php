<?php

  require_once('utils.php');
  require_once('funciones.php');
  _header();
  //WIOAHFUOSHFDOIFJD
  if(validar()){
    _despliega($GLOBALS['nombre'],$GLOBALS['apellido'],$GLOBALS['edad'],$GLOBALS['direccion'],$GLOBALS['CP'],$GLOBALS['ciudad'],$GLOBALS['estado'],$GLOBALS['cancion']);
  } else{
    //echo 'Error<br/>';
    _dForma($GLOBALS['nombreErr'],$GLOBALS['apellidoErr'],$GLOBALS['edadErr'],$GLOBALS['direccionErr'],$GLOBALS['CPErr'],$GLOBALS['ciudadErr'],$GLOBALS['estadoErr'],$GLOBALS['cancionErr'],$GLOBALS['termsErr'],$GLOBALS['nombre'],$GLOBALS['apellido'],$GLOBALS['edad'],$GLOBALS['direccion'],$GLOBALS['CP'],$GLOBALS['ciudad'],$GLOBALS['estado'],$GLOBALS['cancion']);
    echo '</div>';
  }

  /**/

  //S,DNFSDBVIBSDVN
  _preguntas();
  _referencias();
  _footer();

?>
