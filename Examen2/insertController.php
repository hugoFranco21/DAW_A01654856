<?php
    require_once('util.php');
    require_once('utils.php');
  
    
    if(!isset($lugar)){
        $lugar = $_POST['Lugar'];
    } else{
        $lugar = $_POST['Lugar'];
    }
    
    if(!isset($tipo)){
        $tipo = $_POST['Tipo'];
    } else{
        $tipo = $_POST['Tipo'];
    }
    
    //var_dump($tipo);
    //var_dump($lugar);
    //die();
    if(insertarIncidente($lugar,$tipo)){
        _header();
        _tablaIncidentes();
        _formaRegistro();
        echo '<br/><h3 class="green">Registro insertado con éxito!</h3><br/>';
        _footer();
    } else{
        _header();
        _tablaIncidentes();
        _formaRegistro();
        echo '<br/><h3 class="red">Registro no insertado</h3><br/>';
        _footer();
    }
?>