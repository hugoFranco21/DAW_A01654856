<?php
  require_once('util.php');
  require_once('utils.php');
  $name = htmlentities($_POST['nameFruit']);
  $units = htmlentities($_POST['unitsFruit']);
  $quantity = htmlentities($_POST['quantityFruit']);
  $price =htmlentities($_POST['priceFruit']);
  $country = htmlentities($_POST['countryFruit']);
  if(strlen($name) > 0 && strlen($units) > 0 && strlen($quantity) > 0 && strlen($price) > 0 && strlen($country) > 0){
    if(is_numeric($quantity) && is_numeric($price)){
      if(update_by_name($name,$units,$quantity,$price,$country)){
        _header();
        consul();
        echo '<h4 class="text-white">La modificación se realizó exitosamente</h4>';
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
        echo '<h4 class="text-danger">La modificación no se realizó</h4>';
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
    }
  }


?>
