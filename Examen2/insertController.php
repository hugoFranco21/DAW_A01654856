<?php
    require_once('util.php');
    require_once('utils.php');
  
    
    if(isset($_POST['Lugar']) && isset($_POST['Tipo'])){
        $lugar = htmlspecialchars($_POST['Lugar']);
        $tipo = htmlspecialchars($_POST['Tipo']);
        if(insertarIncidente($lugar,$tipo)){
            echo '<script type="text/javascript">alert("La insercion se realizó exitosamente")</script>';
        } else{
            echo '<script type="text/javascript">alert("La insercion no se pudo realizar")</script>';
        }
    } else{
        echo '<script type="text/javascript">alert("Debes elegir un lugar y un tipo para poder registrar el incidente")</script>';
    }
?>