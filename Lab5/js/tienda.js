/*Stylesheet for tienda.html*/
var cant1 = document.getElementById("p1");
var cant2 = document.getElementById("p2");
var cant3 document.getElementById("p3");

var but1 = document.getElementById('but1');
var but2 = document.getElementById('but2');
var but3 = document.getElementById('but3');

but1.onclick = agregar_compra1;

function agregar_compra1(){
    if(cant1.value > 0){

    } else{
      alert('No puedes meter cantidades negativas o nulas')
    }

}
