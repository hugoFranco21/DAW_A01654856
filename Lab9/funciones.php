<?php
	
	function _inicia(){
		echo '<div class="bg-secondary text-white" id="scripts">
				<br/>
				<h2>Scripts</h2>
				<br/>
				<ol>';
	}
	
	function generaArray($n){
		$arreglo = array();
		for($i = 0; $i < $n; $i++){
			$arreglo [$i] = mt_rand(0, 100);
		}
		return $arreglo;
	}
	
	
	function _promedio($n){
		
		$arreglo = generaArray($n);
		$promedio = 0;
		echo '<li> Arreglo = ';
		for($i = 0; $i < count($arreglo); $i++){
			$promedio += $arreglo[$i];
			echo $arreglo[$i];
			if($i <= count($arreglo) - 2){
				echo ', ';
			}
		}
		$promedio /= count($arreglo);
		echo '<br/>Promedio = '.$promedio.'</li>';
	}
	
	function _mediana($n){
		$arreglo = generaArray($n);
		sort($arreglo);
		echo '<li>Arreglo = ';
		for($i = 0; $i < count($arreglo); $i++){
			echo $arreglo[$i];
			if($i <= count($arreglo) - 2){
				echo ', ';
			}
		}
		if(count($arreglo) % 2 == 0){
			echo '<br/>Mediana = '.(($arreglo[floor(count($arreglo)/2 - 1)])+($arreglo[floor(count($arreglo)/2)]))/2 .'</li>';  
		} else{
			echo '<br/>Mediana = '.$arreglo[floor(count($arreglo)/2)].'</li>';
		}
	}
	
	function _lista($n){
		$arreglo = generaArray($n);
		$promedio = 0;
		echo '<li>Con el arreglo: ';
		for($i = 0; $i < count($arreglo); $i++){
			$promedio += $arreglo[$i];
			echo $arreglo[$i];
			if($i <= count($arreglo) - 2){
				echo ', ';
			}
		}
		$promedio /= count($arreglo);
		echo '<ul><li>Promedio = '.$promedio.'</li>';
		if(count($arreglo) % 2 == 0){
			echo '<li>Mediana = '.(($arreglo[floor(count($arreglo)/2 - 1)])+($arreglo[floor(count($arreglo)/2)]))/2 .'</li>';  
		} else{
			echo '<li>Mediana = '.$arreglo[floor(count($arreglo)/2)].'</li>';
		}
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
		</ul></li>';
		
	}
	
	function _tabla($n){
		echo '<li><table class="table table striped>
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
			</table></li>';	
	}
	
	function _ACM($n){
		//$left = 2.0/$n;
		if($n < 2){
			echo '<li> -1';
		} else{
			$numeros = array($n, $n+1, $n*($n+1));
			echo '<li>Los tres números son: ';
			for($i = 0; $i < 3; $i++){
				echo $numeros[$i];
				if($i < 2) echo ', ';
			}
			
		}
		
		echo '</li></ol><br/></div>';
	}
	
	
?>