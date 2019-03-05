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
  
  /*if(isset($_POST["submit"])){
	  if(isset($_POST["firstname"]) && isset($_POST["apellido"])
  }
  var_dump()
  <?php if(isset($error)): ?>
	
  <?php endif ?>*/
  
  _preguntas();
  _referencias();
  _footer();
  
?>
