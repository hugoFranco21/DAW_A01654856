<?php
	
	function generaArray(){
		$arreglo = array();
		for($i = 0; $i < 10; $i++){
			$arreglo [$i] = mt_rand(0, 100);
		}
		return $arreglo;
	}
	
	function _promedio($arreglo){
		$promedio = 0;
		for($i = 0; i < count($arreglo); $i++){
			$promedio += $arreglo[i];
		}
		$promedio /= count($arreglo);
		return $promedio;
	}
	
	function _mediana($arreglo){
		sort($arreglo);
		if(count($arreglo) % 2 == 0){
			return (($arreglo[floor(count($arreglo)/2 - 1)])+($arreglo[count($arreglo)/2 - 1]))/2;   
		} else{
			return $arreglo[floor(count($arreglo)/2)];
		}
	}
	
	function _lista(){
		$arreglo = generaArray();
		echo '<ul>';
		//for($i = 0; $i < count($arreglo); $i++){
		echo '<li>'._promedio($arreglo).'</li>';
		//}
		echo '<li>'._mediana($arreglo).'</li>';
		sort($arreglo);
		echo '<li>Lista de menor a mayor</li>';
		echo '<ul>';
		for($i = 0; $i < count($arreglo); $i++){
			echo '<li>'.$arreglo[$i].'</li>';
		}
		echo '</ul>';
		rsort($arreglo);
		echo '<li>Lista mayor a menor</li>';
		echo '<ul>';
		for($i = 0; $i < count($arreglo); $i++){
			echo '<li>'.$arreglo[$i].'</li>';
		}
		echo '</ul>
		</ul>';
		
	}
	
	function _tabla($n){
		echo '<table class="table table striped>
			<thead class="thead-light">
			<tr>
				<th scope="col">#</th>
				<th scope="col">Cuadrado</th>
				<th scope="col">Cubo</th>
			</tr>
			</thead>
			<tbody>';
		for($i = 1; $i <= $n; $i++){
			echo '<tr>';
			for($j = 1; $j <= 3; $j++){
				if($j == 1){
					echo '<td>'.$i.'</td>';
				} else if($j == 2){
					echo '<td>'.$i*$i.'</td>';
				} else{
					echo '<td>'.$i*$i*$i.'</td>';
				}
			}
			echo '</tr>';
		}
		echo '</tbody>
			</table>';	
	}
	
	function _ACM($n){
		//$left = 2.0/$n;
		if($n < 2){
			return -1;
		} else{
			$numeros = array($n, $n+1, $n($n+1));
			return $numeros;
		}
	}
	
	
?>