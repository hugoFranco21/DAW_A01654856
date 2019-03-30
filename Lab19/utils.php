<?php

  function _header(){
    include('partials/header.html');
  }

  function _ses(){
    include('partials/cerrar.html');
  }

  function _footer(){
    include('partials/footer.html');
  }

  function _forma($nom,$scrt){
	  include('partials/forma.html');
  }

  function _smallForm($nom,$scrt){
	  include('partials/smallForm.html');
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

  function _headerTabla(){
    echo '<table class="table bg-light table-striped">';
    echo '<tr>';
    echo '<th>Name</th>';
    echo '<th>Units</th>';
    echo '<th>Quantity</th>';
    echo '<th>Price</th>';
    echo '<th>Country</th>';
    echo '</tr>';
  }

  function imprime_consulta($result){
    if(mysqli_num_rows($result) > 0){
      _headerTabla();
      while($row = mysqli_fetch_assoc($result)){
        echo '<tr>';
        echo '<td>'.$row["name"].'</td>';
        echo '<td>'.$row["units"].'</td>';
        echo '<td>'.$row["quantity"].'</td>';
        echo '<td>$'.$row["price"].'</td>';
        echo '<td>'.$row["country"].'</td>';
        echo '</tr>';
      }
      echo '</table><br/>';
    }
  }

  function consul(){
    include('partials/secCon.html');
  }
?>
