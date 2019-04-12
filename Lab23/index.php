<?php
  require_once('utils.php');
  require_once('util.php');
  _header();


  _registrar();
  _preguntas();
  _referencias();
  _footer('&callback=initAutocomplete&libraries=places','js/autocomplete.js');

?>
