 /* global $ */ 
$(document).ready(imprimir());

function imprimir(){
  $.post('tablaController.php')
  .done(function(data){
    $('#tablaIncidentes').html(data);
  });
}

$(document).ready(function(){
    $.post('opcionController.php', { opcion : 1 } )
    .done(function(data){
        $('#listaLugares').append(data);
        M.AutoInit();
    });
});

$(document).ready(function(){
    $.post('opcionController.php', { opcion : 2 } )
    .done(function(data){
        $('#listaTipos').append(data);
        M.AutoInit();
    });
});

$(document).ready(numero());
    
function numero(){
    $.post('opcionController.php', { opcion : 3 } )
    .done(function(data){
        $('#numeroIncidentes').html(data);
        M.AutoInit();
    });
}

$(document).ready(function(){
  $("#formRegistro").submit(function (ev){
    ev.preventDefault();
     var lugar= $('#listaLugares').val();
     var tipo= $('#listaTipos').val();
     $.post('insertController.php', { Lugar : lugar, Tipo : tipo } )
     .done(function(data){
       imprimir();
       numero();
       $('#listaLugares').val(" ");
       $('#listaTipos').val(" ");
      })
      .fail(function(){
        imprimir();
        numero();
        console.log('Error');
      });
    });
});