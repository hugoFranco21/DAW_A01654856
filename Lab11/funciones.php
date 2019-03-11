<?php
// define variables and set to empty values
$nombre = $apellido = $edad = $direccion = $CP = $ciudad = $estado = $cancion = $terms = "";
$nombreErr = $apellidoErr = $edadErr = $direccionErr = $CPErr = $ciudadErr = $estadoErr = $cancionErr = $termsErr = "";

function validar(){
	$count = 0;
	if (empty($_POST["nombre"])) {
		$GLOBALS['nombreErr'] = "Campo requerido";
		$count++;
	} else {
		$GLOBALS['nombre'] = test_input($_POST["nombre"]);
		// check if name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z ]*$/",$GLOBALS['nombre'])) {
			$GLOBALS['nombreErr'] = "Solo se permiten letras y espacios en blanco";
			$count++;
		} else {
			$GLOBALS['nombre'] = strtolower($GLOBALS['nombre']);
			$GLOBALS['nombre'] = ucwords($GLOBALS['nombre']);
			//$GLOBALS['nombreErr'] = $GLOBALS['nombre'];
		}
	}

	if (empty($_POST["apellido"])) {
		$GLOBALS['apellidoErr'] = "Campo requerido";
		$count++;
	} else {
		$GLOBALS['apellido'] = test_input($_POST["apellido"]);
		// check if name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z ]*$/",$GLOBALS['apellido'])) {
			$GLOBALS['apellidoErr'] = "Solo se permiten letras y espacios en blanco";
			$count++;
		} else {
			$GLOBALS['apellido'] = strtolower($GLOBALS['apellido']);
			$GLOBALS['apellido'] = ucwords($GLOBALS['apellido']);
			//$GLOBALS['apellidoErr'] = $GLOBALS['apellido'];
		}
	}

	if (empty($_POST["edad"])) {
		$GLOBALS['edadErr'] = "Campo requerido";
		$count++;
	} else {
		$GLOBALS['edad'] = test_input($_POST["edad"]);
		// check if name only contains letters and whitespace
		if ($GLOBALS['edad'] < 13) {
			$GLOBALS['edadErr'] = "Debes tener al menos 13 años";
			$count++;
		} else{
			//$GLOBALS['edadErr'] = $GLOBALS['edad'];
		}
	}

	if (empty($_POST["direccion"])) {
		$GLOBALS['direccionErr'] = "Campo requerido";
		$count++;
	} else {
		$GLOBALS['direccion'] = test_input($_POST["direccion"]);
	}

	if (empty($_POST["CP"])) {
		$GLOBALS['CPErr'] = "Campo requerido";
		$count++;
	} else {
		$GLOBALS['CP'] = test_input($_POST["CP"]);
		// check if name only contains letters and whitespace
		if (!preg_match("/^[0-9]*$/",$GLOBALS['CP'])) {
			$GLOBALS['CPErr'] = "Solo se permiten números";
			$count++;
		} else {
			if(strlen($GLOBALS['CP']) != 5){
				$GLOBALS['CPErr'] = "El C.P. debe ser de 5 digitos";
				$count++;
			}
		}
	}

	if (empty($_POST["ciudad"])) {
		$GLOBALS['ciudadErr'] = "Campo requerido";
		$count++;
	} else {
		$GLOBALS['ciudad'] = test_input($_POST["ciudad"]);
		// check if name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z ]*$/",$GLOBALS['ciudad'])) {
			$GLOBALS['ciudadeErr'] = "Solo se permiten letras y espacios en blanco";
			$count++;
		} else {
			$GLOBALS['ciudad'] = strtolower($GLOBALS['ciudad']);
			$GLOBALS['ciudad'] = ucwords($GLOBALS['ciudad']);
		}
	}

	if (empty($_POST["estado"])) {
		$GLOBALS['estadoErr'] = "Campo requerido";
		$count++;
	} else {
		$GLOBALS['estado'] = test_input($_POST["estado"]);
		// check if name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z ]*$/",$GLOBALS['estado'])) {
			$GLOBALS['estadoErr'] = "Solo se permiten letras y espacios en blanco";
			$count++;
		} else {
			if(strlen($GLOBALS['estado']) > 4){
				$GLOBALS['estado'] = strtolower($GLOBALS['estado']);
				$GLOBALS['estado'] = ucwords($GLOBALS['estado']);}
		}
	}

	if (empty($_POST["cancion"])) {
		$GLOBALS['cancionErr'] = "Campo requerido";
		$count++;
	} else {
		$GLOBALS['cancion'] = test_input($_POST["cancion"]);
		// check if name only contains letters and whitespace
		$GLOBALS['cancion'] = strtolower($GLOBALS['cancion']);
		$GLOBALS['cancion'] = ucwords($GLOBALS['cancion']);

	}

	if(!isset($_POST["terms"])){
		$GLOBALS['termsErr'] = "Acepte los términos";
		$count++;
	}
	//$nombre = test_input($_POST["nombre"]);
	//$apellido = test_input($_POST["apellido"]);
	//$edad = test_input($_POST["edad"]);
	//$direccion = test_input($_POST["direccion"]);
	//$CP = test_input($_POST["CP"]);
	//$ciudad = test_input($_POST["ciudad"]);
	//$estado = test_input($_POST["estado"]);
	//$cancion = test_input($_POST["cancion"]);



	if($count > 0){
	 return false;
	} else{
	 return true;
	}

}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function _despliega($nombre,$apellido,$edad,$direccion,$CP,$ciudad,$estado,$cancion){
	echo '<div class="bg-success text-white">
					<br/>
					<h2>Registro exitoso!!!</h2>
					<ul>
						<li>Nombre(s): '.$nombre.'</li>
						<li>Apellido(s): '.$apellido.'</li>
						<li>Edad: '.$edad.'</li>
						<li>Direccion: '.$direccion.'</li>
						<li>C.P.: '.$CP.'</li>
						<li>Ciudad: '.$ciudad.'</li>
						<li>Estado: '.$estado.'</li>
						<li>Canción: '.$cancion.'</li>
					</ul>
					<br/>
					</div>';
}

 function _dForma($err1, $err2, $err3, $err4, $err5, $err6, $err7, $err8, $err9,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8){
	 echo '<div class="bg-secondary text-white" id="scripts">
	 <br/>
	 <h2>Registro club de fans de Los Angeles Azules</h2>
	 Favor de escribir todos los campos sin acentos [´]
	 <br/>
	 <form action="action.php" method="POST">
	   <div class="form-group">
	     <label for="nombre">Ingrese su nombre </label> <span class="text-white bg-danger">'.$err1.'</span>
	     <input type="text" class="form-control" name="nombre" value="'.$p1.'">
	   </div>
	   <div class="form-group">
	     <label for="apellido">Ingrese su apellido </label> <span class="text-white bg-danger">'.$err2.'</span>
	     <input type="text" class="form-control" name="apellido" placeholder="Apellido" value="'.$p2.'">
	   </div>
	   <div class="form-group">
	     <label for="edad">Ingrese su edad </label> <span class="text-white bg-danger">'.$err3.'</span>
	     <input type="number" class="form-control" name="edad" placeholder="Edad" value="'.$p3.'">
	   </div>
	   <div class="form-group">
	     <label for="direccion">Ingrese su direccion </label> <span class="text-white bg-danger">'.$err4.'</span>
	     <input type="text" class="form-control" name="direccion" placeholder="Direccion" value="'.$p4.'">
	   </div>
	   <div class="form-group">
	     <label for="CP">Ingrese su codigo postal </label> <span class="text-white bg-danger">'.$err5.'</span>
	     <input type="text" class="form-control" name="CP" placeholder="C.P." value="'.$p5.'">
	   </div>
	   <div class="form-group">
	     <label for="ciudad">Ingrese su ciudad </label> <span class="text-white bg-danger">'.$err6.'</span>
	     <input type="text" class="form-control" name="ciudad" placeholder="Ciudad" value="'.$p6.'">
	   </div>
	   <div class="form-group">
	     <label for="estado">Ingrese su estado </label> <span class="text-white bg-danger">'.$err7.'</span>
	     <input type="text" class="form-control" name="estado" placeholder="Estado" value="'.$p7.'">
	   </div>
	   <div class="form-group">
	     <label for="cancion">Escriba el nombre de su cancion favorita de Los Angeles Azules </label> <span class="text-white bg-danger">'.$err8.'</span>
	     <input type="text" class="form-control" name="cancion" placeholder="Cancion" value="'.$p8.'">
	   </div>
	   <div class="form-check">
	     <input class="form-check-input" type="checkbox" value="" id="code" name="terms">
	     <label class="form-check-label" for="terms">
	       He leído los <a href="https://www.youtube.com/watch?v=daL7_QWYdkk" target=_blank id="code">términos y condiciones </a>
	     </label> <span class="text-white bg-danger">'.$err9.'</span>
	   </div>
	   <br/>
	   <button type="submit" class="btn btn-primary">Submit</button>
	 </form>
	 <br/>';
 }
?>
