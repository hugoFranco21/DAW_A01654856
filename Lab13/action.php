<?php
  session_start();
  require_once('utils.php');
  if(empty($_POST['usuario']) || empty($_POST['PWD'])){

    echo '<h1>No puede dejar campos vacíos</h1>';
    sleep(1);
    echo '<script>window.location.href = "index.php"</script>';

    //sleep(5);
  }
  if(!isset($_SESSION['usuario']) && isset($_POST['usuario'])){
    $_SESSION['usuario']=test_input($_POST['usuario']);
  }
  _header($_SESSION['usuario']);
  _ses();
  _forma();

  _subir();
  _preguntas();
  _referencias();
  _footer();

?>
