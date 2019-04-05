<?php 

    function _header(){
        include("views/_header.html");
    }
    
    function _tablaIncidentes(){
        include("views/_tablaIncidentes.html");
    }
    
    function _formaRegistro(){
        include("views/_formaRegistroIncidente.html");
    }
    
    function _footer(){
        include("views/_footer.html");
    }
    
    
    function displayIncidents($result){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
            echo '<tr>';
            echo '<td>'.$row['fecha_hora'].'</td>';
            echo '<td>'.$row['nombre'].'</td>';
            echo '<td>'.$row['denominacion'].'</td>';
            echo '</tr>';
            }
        }
    }
    
    function displayOptions($result){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_row($result)){
                echo '<option value="'.$row[0].'">'.$row[0].'</option>';
            }
        }
    }
    
    function numRows($result){
        $data=mysqli_fetch_assoc($result);
        echo 'Incidentes '.$data['Numero'];
    }
    
?>