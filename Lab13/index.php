<?php
  $nombre='';
  if (session_status() == PHP_SESSION_NONE){
        session_start();
    }
  if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $_SESSION['usuario']=$_POST['usuario'];
    $_SESSION['PWD']=$_POST['PWD'];
    $GLOBALS['nombre']=$_POST['usuario'];
    //echo '<h2>Holaaaaa</h2>';
  }
  require_once('utils.php');
  _header($nombre);
  if(isset($_SESSION['fileToUpload'])){
    echo '<img src="uploads/'.$_SESSION['fileToUpload'].'"/>';
  }
  _ses();
  _forma();
  if (isset($_SESSION['usuario'])){
    _subir();
  }

  _preguntas();
  _referencias();
  _footer();

?>
