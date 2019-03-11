<?php

  require_once('utils.php');
  require_once('funciones.php');
  _header();
  _forma();
  echo '</div>';
  //include('funciones.php');

  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    validar();
  }
  _preguntas();
  _referencias();
  _footer();

?>
