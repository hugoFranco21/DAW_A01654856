var bot = document.getElementById('emp');
emp.onclick = empezar_juego;

function allowDrop(ev) {
  ev.preventDefault();
}

function drag(ev) {
  ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
  ev.preventDefault();
  var data = ev.dataTransfer.getData("text");
  ev.target.appendChild(document.getElementById(data));
}

function empezar_juego(){
  setTimeout(myFunction, 6000);
}

function myFunction(){
  alert('Se acabo el tiempo! Se reiniciara la pagina');
  setTimeout(location.reload(), 3000)
}
