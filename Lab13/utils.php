<?php

  function _header($ent){
    echo '<!DOCTYPE html>
    <html lang="es">
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Laboratorio de DAW 13">
        <meta name="author" content="Hugo Franco">
        <meta name="generator" content="Jekyll v3.8.5">
        <title>Lab 13</title>

        <!-- Bootstrap core CSS -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <!-- Custom styles for this template -->
        <link href="css/in.css" rel="stylesheet" type="text/css"/>
      </head>
      <body>
        <header>
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
            <a class="navbar-brand" href="index.php">Lab. 13 Manejo de sesiones con PHP</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="#scripts">Registro <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#preguntas">Preguntas</a>
                </li>
    			<li class="nav-item">
                  <a class="nav-link" href="#ref">Referencias</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="#">';
                //if($ent==''){

                //} else{
                  echo 'Bienvenido '.$ent.'!';
                //}
                echo '</a>
                </li>
              </ul>
            </div>
          </nav>
        </header>
    ';
  }

  function _ses(){
    include('partials/cerrar.html');
  }

  function _footer(){
    include('partials/footer.html');
  }

  function _forma(){
	  include('partials/forma.html');
  }

  function _preguntas(){
	  include('partials/preguntas.html');
  }

  function _referencias(){
	  include('partials/referencias.html');
  }

  function _subir(){
    include('partials/subirarchivo.html');
  }

  function test_input($data) {
  	$data = trim($data);
  	$data = stripslashes($data);
  	$data = htmlspecialchars($data);
  	return $data;
  }
?>
