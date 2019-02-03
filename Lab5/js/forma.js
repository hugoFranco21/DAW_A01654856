/*Scripts for forma.html*/
var subBut = document.getElementById('but');
var resBut = document.getElementById('res');
var salida = ''
var exit = document.getElementById('cita');
var months = ["Ene. ", "Feb. ", "Mar. ", "Abr. ", "May. ", "Jun. ", "Jul. ", "Ago. ", "Sept. ", "Oct. ", "Nov. ", "Dic. "];

document.getElementById('IEEEgen').onsubmit = cancelRel;
subBut.onclick = generar_cita;
resBut.onclick = resetear;

function generar_cita(){
  if(document.getElementById('nomAutor').value != ''){
    salida += document.getElementById('nomAutor').value.charAt(0) + '. '
  }
  salida += document.getElementById('apAutor').value + '. ';
  salida += '"' + document.getElementById('articulo').value + '". ';
  salida += 'Internet: ' + document.getElementById('URL').value + '. ';
  if(document.getElementById('fechaCr').value != ''){
    salida += months[document.getElementById('fechaCr').valueAsDate.getMonth()];
    salida += document.getElementById('fechaCr').valueAsDate.getDate() + ', ';
    salida += document.getElementById('fechaCr').valueAsDate.getFullYear() + '. ';
  }   
  salida += '[' + months[document.getElementById('fechaAc').valueAsDate.getMonth()];
  salida += document.getElementById('fechaAc').valueAsDate.getDate() + ', ';
  salida += document.getElementById('fechaAc').valueAsDate.getFullYear() + '].';
  //console.log(salida);
  exit.innerHTML=salida;
  document.getElementById("output").style.display = "block"
  salida = '';
}

function resetear(){
  document.getElementById("output").style.display = "none";
}

function cancelRel(){
  return false;
}
