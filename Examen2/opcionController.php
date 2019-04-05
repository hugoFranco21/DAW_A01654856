<?php
  require_once('util.php');
  require_once('utils.php');
  $opcion=$_POST['opcion'];
  if($opcion == 1){
    displayOptions(getLugares());
  } else if($opcion == 2) {
    displayOptions(getTipos());
  } else{
    numRows(contarRegistros());
  }
?>