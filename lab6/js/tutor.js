/*Scripts for tutoriales.html*/
var pika = document.getElementById('pikachu');
var i = 0;
var posiciones = ['static','relative','fixed', 'absolute', 'sticky'];
var cam = document.getElementById('cambiar');
var fuentes = ['sans-serif','serif','Monospace'];
var est = ['normal','italic','oblique'];
var tama = ['xx-small', 'x-small', 'small', 'medium', 'large', 'x-large', 'xx-large'];



pika.onclick = function modificar_pos(){
  //pika.style.position(posiciones[i % 5]);
  pika.style.position = posiciones[i % 5];
  //pika.style.position = 'sticky';
  console.log(pika.style.position);
  i++;
}

document.getElementById('familia').onclick = function fam(){
  cam.style.fontFamily = fuentes[i % 3];
  i++;
  //console.log(cam.style.fontFamily);
}

document.getElementById('estilo').onclick = function es(){
  cam.style.fontStyle = est[i % 3];
  i++;
  //console.log(cam.style.fontStyle);
}

document.getElementById('tam').onclick = function fsize(){
  cam.style.fontSize = tama[i % 7];
  i++;
  //console.log(cam.style.fontSize);
}

document.getElementById('neg').onclick = function fneg(){
  if(cam.style.fontWeight == 400){
    cam.style.fontWeight = 700;
    document.getElementById('neg').innerHTML = 'Desactivar negritas';
  } else{
    cam.style.fontWeight = 400;
    document.getElementById('neg').innerHTML = 'Activar negritas';
  }
}

document.getElementById('inv').onclick = function finv(){
  if(cam.style.visibility != 'hidden'){
    cam.style.visibility = 'hidden';
    document.getElementById('inv').innerHTML = 'Hacer visible';
  } else{
    cam.style.visibility = 'visible';
    document.getElementById('inv').innerHTML = 'Hacer invisible';
  }
  //console.log(cam.style.fontSize);
}

document.getElementById('eventos').onmouseover = function ch(){
  document.getElementById('eventos').style.fontFamily ='Monospace';
}

document.getElementById('eventos').onmouseout = function ch1(){
  document.getElementById('eventos').style.fontFamily ='serif';
}
