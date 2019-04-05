<?php
  require_once('utils.php');
  require_once('util.php');
  _header();
  consul();

  _forma('Insertar registro','fruit.php');
  _smallForm('Borrar registro');
  echo '<br/>
        </div>';
  _preguntas();
  _referencias();
  _footer();

?>
