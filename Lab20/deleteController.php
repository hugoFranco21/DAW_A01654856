<?php
  require_once('util.php');
  require_once('utils.php');
  $name = $_POST['nameFruit'];
  $name = htmlentities($name);
  if(delete_by_name($name)){
    header('Location: index.php');
  } else{
    header('Location: index.php');
  }

?>
