<?php
	
	function generaArray(){
		$arreglo = array();
		for($i = 0; $i < 10; $i++){
			$arreglo [$i] = mt_rand(0, 100);
		}
		return $arreglo;
	}
	
	function _promedio(){
		$arreglo = generaArray();
		$promedio = 0;
		for($i = 0; i < count($arreglo); $i++){
			$promedio += $arreglo[i];
		}
		$promedio /= count($arreglo);
	}
	
	function _mediana(){
		$arreglo = generaArray();
		sort($arreglo);
		if(count($arreglo) % 2 == 0){
			return (($arreglo[floor(count($arreglo)/2 - 1)])+($arreglo[count($arreglo)/2 - 1]))/2;   
		} else{
			return $arreglo[floor(count($arreglo)/2)];
		}
	}
	
	
?>