<?php
  session_start();
  require_once('utils.php');
  _header(" ");

  _ses();
  _forma();

  _preguntas();
  _referencias();
  _footer();

?>
