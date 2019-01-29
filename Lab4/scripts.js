/*Javascript file for lab 4*/
function func1() {
  var num = prompt("Ingresa un numero");
  var table = document.createElement('table');
  //var currentRow;
  //var element;
  for(var i = 1; i <= num; i++){
    table.insertRow();
    for(var j = 0; j < 3; j++){
      var item = document.createElement('td');
      item.innerHTML = i*Math.pow(i,j);
      console.log(i*Math.pow(i,j));
    }
  }
}

function func2() {
  startTime = new Date();
  var x = Math.floor(Math.random() * 100);
  var y = Math.floor(Math.random() * 100);
  var res = x+y;
  console.log(x);
  console.log(y);
  var num = prompt("Ingresa el resultado de " + x + " + " + y);
  endTime = new Date();
  var timeDiff = endTime - startTime;
  if(num == res){
    alert('Correcto, tardaste ' + timeDiff/1000 + ' segundos en escribir tu respuesta');
  } else{
    alert('Incorrecto, la respuesta correcta era ' + res +', tardaste ' + timeDiff/1000 + ' segundos en escribir tu respuesta');
  }
}

function func3(){
  var n = prompt('Dame el numero de elementos que quieres en el arreglo');
  var arreglo = new Array(n);
  var neg = [];
  var cer = [];
  var pos = [];
  for(var i = 0; i < n; i++){
    arreglo[i] = Math.floor(Math.random() * 100) - 50;
  }
  for(var i = 0; i < n; i++){
    if(arreglo[i] < 0){
      neg.push(arreglo[i])
    } else if(arreglo[i] == 0){
      cer.push(arreglo[i]);
    } else{
      pos.push(arreglo[i])
    }
  }
  imprime_Ar(neg);
  imprime_Ar(cer);
  imprime_Ar(pos);
  console.log(neg.length);
  console.log(cer.length);
  console.log(pos.length);
}

function imprime_Ar(params){
  for(var i = 0; i < params.length; i++){
    console.log(params[i] + ' ');
  }
}

function func4(){
  var n = prompt('Ingresa el numero de elementos de una fila de la matriz');
  var arreglo = new Array(n);
  var salida = new Array(n);
  for(var i = 0; i < n; i++){
    arreglo[i] = new Array(n);
  }
  for(var i = 0; i < n; i++){
    salida[i] = 0;
    for(var j = 0; j < n; j++){
      arreglo[i][j] = Math.floor(Math.random() * 100) - 50;
      salida[i] += arreglo[i][j];
    }
    salida[i] /= n;
  }
  console.log(arreglo);
  console.log(salida);
}

function func5(){
  var n = prompt('Ingresa el numero que quieres invertir');
  var x;
  x = parseInt(n.toString().split('').reverse().join(''));
  console.log(x);
}

function func6(){
  var num, count = 0, au = 10, ans, aux, aux2, aux3;
  //int num, count = 0, au = 10, ans, aux, aux2, aux3;
  num = prompt('Ingresa el balance de cuenta actual');
	//scanf("%i", &num);
	if(num >= 0){
		ans = num;
	} else{
		while(Math.ceil(num / au) != 0){
			count++;
			ans = Math.ceil(num / au);
			au = au*10;
		}
		if(count == 0){
			ans = 0;
		} else{
			aux = num % (10);
			aux2 = num % (100);
			aux2 = Math.ceil(aux2 / 10);
			if(aux < aux2){
				num = Math.ceil(num / 100)*10;
				ans = num + aux2;
			} else{
				num = Math.ceil(num / 100)*10;
				ans = num + aux;
			}
		}
	}
  console.log("resp =" + ans);
}
