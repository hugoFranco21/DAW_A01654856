<?php
  require_once('util.php');
  require_once('utils.php');
  $name = $_POST['nameFruit'];
  $name = htmlentities($name);
  if(delete_by_name($name)){
    _header();
    consul();
    echo '<h4 class="text-white">El borrado se realizó exitosamente</h4>';
    echo '<h3 class="text-white">Toda la tabla fruits</h3>';
    imprime_consulta(getFruits());
    echo '<br/>
          </div>';
    _forma('Insertar registro','fruit.php');
    _forma('Actualizar registro','updateController.php');
    _smallForm('Borrar registro','deleteController.php');
    _preguntas();
    _referencias();
    _footer();
  } else{
    _header();
    consul();
    echo '<h4 class="text-danger">El borrado no se pudo realizar</h4>';
    echo '<h3 class="text-white">Toda la tabla fruits</h3>';
    imprime_consulta(getFruits());
    echo '<br/>
          </div>';
    _forma('Insertar registro','fruit.php');
    _forma('Actualizar registro','updateController.php');
    _smallForm('Borrar registro','deleteController.php');
    _preguntas();
    _referencias();
    _footer();
  }

?>
