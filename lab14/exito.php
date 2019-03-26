<?php
  session_start();
  require_once('utils.php');
  if(!isset($_SESSION['usuario'])){
    $_SESSION['usuario']=$_POST['usuario'];
  }
  _header($_SESSION['usuario']);
  _ses();
  _forma();

  _subir();

  /**/
  echo '<div class="imagen bg-success"><br/>';
  /*if(isset($_SESSION['fileToUpload'])){
    echo '<img src="uploads/'.$_SESSION['fileToUpload'].'"/>';
  } else{
    echo 'No se guardo file to upload';
  }*/
  if(isset($_SESSION['link'])){
    echo '<img src="uploads/'.$_SESSION['link'].'"/><br/><h3 class="text-white">Su archivo '.$_SESSION['link'].' se ve muy bien!</h3>';
  } else{
    echo '<h3 class="text-white">No se logro subir su imagen</h3>';
  }
  echo '<br/><br/></div>';
  _preguntas();
  _referencias();
  _footer();

?>
