<?php
  require_once('util.php');
  require_once('utils.php');
  $name = $_POST['nameFruit'];
  $name = htmlentities($name);
  delete_by_name($name);

?>
