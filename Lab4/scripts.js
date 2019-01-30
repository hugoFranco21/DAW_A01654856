/*Javascript file for lab 4*/
var indiceTab = 1;
var indicePl = 1;

function func1() {
  var num = prompt("Ingresa un numero");
  var table = document.createElement('table');
  for(var i = 0, k = 0; i <= num; i++, k++){
    var row = document.createElement('tr');
    for(var j = 0; j < 3; j++){
      var item = document.createElement('td');
      if(i == 0){
        switch(j){
          case 0:
            var textnode = document.createTextNode('Numero');
            break;
          case 1:
            var textnode = document.createTextNode('Cuadrado');
            break;
          case 2:
            var textnode = document.createTextNode('Cubo');
            break;
        }
      } else{
        var textnode = document.createTextNode((i*Math.pow(i,j)).toString());
      }
      item.appendChild(textnode);
      row.appendChild(item);
    }
    table.appendChild(row);
  }
  document.getElementById("fun1").appendChild(table);
}

function func2() {
  startTime = new Date();
  var x = Math.floor(Math.random() * 100);
  var y = Math.floor(Math.random() * 100);
  var res = x+y;
  //console.log(x);
  //console.log(y);
  var num = prompt("Ingresa el resultado de " + x + " + " + y);
  endTime = new Date();
  var timeDiff = endTime - startTime;
  if(num == res){
    alert('Correcto, tardaste ' + timeDiff/1000 + ' segundos en escribir tu respuesta');
    var par = document.createElement('p');
    var tex = document.createTextNode('Acierto, tiempo: ' + timeDiff/1000 + ' segundos.');
    par.appendChild(tex);
  } else{
    alert('Incorrecto, la respuesta correcta era ' + res +', tardaste ' + timeDiff/1000 + ' segundos en escribir tu respuesta');
    var par = document.createElement('p');
    var tex = document.createTextNode('Error, tiempo: ' + timeDiff/1000 + ' segundos.');
    par.appendChild(tex);
  }
  document.getElementById("fun2").appendChild(par);
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
      pos.push(arreglo[i]);
    }
  }
  var tab = document.createElement('table');
  var row = document.createElement('tr');
  var cell = document.createElement('th');
  //var par1 = document.createElement('p');
  var tex = document.createTextNode(arreglo);
  cell.appendChild(tex);
  row.appendChild(cell);
  tab.appendChild(row);
  var tex = document.createTextNode('Hay ' + neg.length + ' numeros negativos en el arreglo');
  var row = document.createElement('tr');
  var cell = document.createElement('td');
  cell.appendChild(tex);
  row.appendChild(cell);
  tab.appendChild(row);
  //document.getElementById('fun3').appendChild(par);
  //console.log(cer.length);
  var tex = document.createTextNode('Hay ' + cer.length + ' ceros en el arreglo');
  var row = document.createElement('tr');
  var cell = document.createElement('td');
  cell.appendChild(tex);
  row.appendChild(cell);
  tab.appendChild(row);
  //document.getElementById('fun3').appendChild(par);
  //console.log(pos.length);
  var tex = document.createTextNode('Hay ' + pos.length + ' numeros positivos en el arreglo');
  var row = document.createElement('tr');
  var cell = document.createElement('td');
  cell.appendChild(tex);
  row.appendChild(cell);
  tab.appendChild(row);
  document.getElementById('fun3').appendChild(tab);

}

function func4(){
  var n = prompt('Ingresa el numero de elementos de una fila de la matriz');
  var tabl = document.createElement('table');
  var proms = document.getElementById('resp4');
  var ind = 1;
  var arreglo = new Array(n);
  var salida = new Array(n);
  for(var i = 0; i < n; i++){
    arreglo[i] = new Array(n);
  }
  for(var i = 0; i < n; i++){
    salida[i] = 0;
    var row = document.createElement('tr');
    var rr = proms.insertRow(ind);
    ind++;
    for(var j = 0; j < n; j++){
      var cell = document.createElement('td');
      arreglo[i][j] = Math.floor(Math.random() * 100) - 50;
      var tex = document.createTextNode(arreglo[i][j].toString());
      salida[i] += arreglo[i][j];
      cell.appendChild(tex);
      row.appendChild(cell);
    }
    tabl.appendChild(row);
    salida[i] /= n;
    var cell1 = rr.insertCell(0)
    var cell2 = rr.insertCell(1);
    cell1.innerHTML = (i+1).toString();
    cell2.innerHTML = (salida[i]).toString();
  }
  document.getElementById('fun4').appendChild(tabl);
  console.log(arreglo);
  console.log(salida);
}

function func5(){
  var n = prompt('Ingresa el numero que quieres invertir');
  var x;
  x = parseInt(n.toString().split('').reverse().join(''));
  var table = document.getElementById('inver');
  var row = table.insertRow(indicePl);
  indicePl++;
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  cell1.innerHTML = n.toString();
  cell2.innerHTML = x.toString();
}

function func6(){
  var num, count = 0, au = 10, ans, aux, aux2, aux3, aux4;
  //int num, count = 0, au = 10, ans, aux, aux2, aux3;
  num = prompt('Ingresa el balance de cuenta actual');
  aux4 = num;
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
  if(num != null){
    var table = document.getElementById('probACM');
    var row = table.insertRow(indiceTab);
    indiceTab++;
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    cell1.innerHTML = aux4.toString();
    cell2.innerHTML = ans.toString();
  }
  //console.log("resp =" + ans);
}
