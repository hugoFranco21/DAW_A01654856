/*Scripts for tutoriales.html*/
var pika = document.getElementById('pikachu');
var i = 0;
var posiciones = ['static','relative','fixed', 'absolute', 'sticky'];

pika.onclick = function modificar_pos(){
  //pika.style.position(posiciones[i % 5]);
  pika.style.position = posiciones[i % 5];
  //pika.style.position = 'sticky';
  console.log(pika.style.position);
  i++;
}
