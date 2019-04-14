<?php
  require_once('util.php');
  require_once('utils.php');
  $name = $_POST['nameFruit'];
  $name = htmlspecialchars($name);
  delete_by_name($name);


?>
