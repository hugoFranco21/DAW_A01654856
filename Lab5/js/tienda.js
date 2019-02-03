/*Stylesheet for tienda.html*/
var cant1 = document.getElementById("p1");
var cant2 = document.getElementById("p2");
var cant3 = document.getElementById("p3");
var numRow = 0;

var but1 = document.getElementById('but1');
var but2 = document.getElementById('but2');
var but3 = document.getElementById('but3');
var check = document.getElementById('checkout');

var bod = document.getElementById('bo');
var cost = document.getElementById('costo');
var total = 0;

but1.onclick = agregar_compra1;
but2.onclick = agregar_compra2;
but3.onclick = agregar_compra3;
check.onclick = finalizar;

function agregar_compra1(){
    if(cant1.value > 0){
      var row = bod.insertRow();
      var cell0 = row.insertCell(0);
      var cell1 = row.insertCell(1);
      var cell2 = row.insertCell(2);
      var cell3 = row.insertCell(3);
      var cell4 = row.insertCell(4);
      cell0.innerHTML = "Air Jordan 1";
      cell1.innerHTML = cant1.value.toString();
      cell2.innerHTML = '$ ' + ((cant1.value*3200)/1.16).toFixed(2);
      cell3.innerHTML = "16%";
      cell4.innerHTML = '$ ' + (cant1.value*3200).toFixed(2);
      total += (cant1.value*3200);
      cost.innerHTML = '$ ' + total.toFixed(2);
      cant1.value = '';
      numRow++;
    } else{
      alert('No puedes meter cantidades negativas o nulas')
    }
}

function agregar_compra2(){
    if(cant2.value > 0){
      var row = bod.insertRow();
      var cell0 = row.insertCell(0);
      var cell1 = row.insertCell(1);
      var cell2 = row.insertCell(2);
      var cell3 = row.insertCell(3);
      var cell4 = row.insertCell(4);
      cell0.innerHTML = "Adidas Ultraboost";
      cell1.innerHTML = cant2.value.toString();
      cell2.innerHTML = '$ ' + ((cant2.value*3600)/1.16).toFixed(2);
      cell3.innerHTML = "16%";
      cell4.innerHTML = '$ ' + (cant2.value*3600).toFixed(2);
      total += (cant2.value*3600);
      cost.innerHTML = '$ ' + total.toFixed(2);
      cant2.value = '';
      numRow++;
    } else{
      alert('No puedes meter cantidades negativas o nulas')
    }
}

function agregar_compra3(){
    if(cant3.value > 0){
      var row = bod.insertRow();
      var cell0 = row.insertCell(0);
      var cell1 = row.insertCell(1);
      var cell2 = row.insertCell(2);
      var cell3 = row.insertCell(3);
      var cell4 = row.insertCell(4);
      cell0.innerHTML = "Air Jordan 4";
      cell1.innerHTML = cant3.value.toString();
      cell2.innerHTML = '$ ' + ((cant3.value*4000)/1.16).toFixed(2);
      cell3.innerHTML = "16%";
      cell4.innerHTML = '$ ' + (cant3.value*4000).toFixed(2);
      total += (cant3.value*4000);
      cost.innerHTML = '$ ' + total.toFixed(2);
      cant3.value = '';
      numRow++;
    } else{
      alert('No puedes meter cantidades negativas o nulas')
    }
}

function finalizar(){
  if(total === 0){
    alert('No puede proceder a pagar, su carrito esta vacio');
  } else{
    alert('Pago procesado, gracias por su preferencia!');
    while(numRow >= 0){
      numRow--;
      bod.deleteRow(numRow);
    }

    total = 0;
    cost.innerHTML = '$ ' + total.toFixed(2);
  }
}
