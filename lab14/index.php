<?php
  require_once('utils.php');
  require_once('util.php');
  _header();
  consul();
  echo '<h3 class="text-white">Toda la tabla fruits</h3>';
  imprime_consulta(getFruits());
  echo '<h3 class="text-white">Todas las frutas con el patrón "fresa"</h3>';
  imprime_consulta(getFruitsByName('fresa'));
  echo '<h3 class="text-white">Todas las frutas más baratas que 70</h3>';
  imprime_consulta(getCheapestFruits(70));
  echo '<h3 class="text-white">Todas las frutas de Suecia</h3>';
  imprime_consulta(getFruitsByCountry('Sweden'));
  echo '<h3 class="text-white">Todas las frutas con más de 80 unidades</h3>';
  imprime_consulta(getFruitsByUnits(80));
  echo '<br/>
        </div>';
  _preguntas();
  _referencias();
  _footer();

?>
