<?php

  require_once('utils.php');
  require_once('funciones.php');
  _header();
  
  _inicia();
  _promedio($_POST["fun1"]);
  _mediana($_POST["fun2"]);
  _lista($_POST["fun3"]);
  _tabla($_POST["fun4"]);
  _ACM($_POST["fun5"]);
  
  
  
  _preguntas();
  _referencias();
  _footer();
  
?>
