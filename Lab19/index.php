<?php
  require_once('utils.php');
  require_once('util.php');
  _header();
  //getFruitName();
  _formAjax();
  /*_forma('Insertar registro','fruit.php');
  //_forma('Actualizar registro','updateController.php');
  //_smallForm('Borrar registro','deleteController.php');
  consul();
  echo '<h3 class="text-white">Toda la tabla fruits</h3>';
  imprime_consulta(getFruits());
  echo '<br/>
        </div>';*/
  consul();
  echo '<h3 class="text-white">Toda la tabla fruits</h3>';
  imprime_consulta(getFruits());
  _forma('Insertar registro','fruit.php');
  _smallForm('Borrar registro','deleteController.php');
  echo '<br/>
        </div>';
  _preguntas();
  _referencias();
  _footer();

?>
