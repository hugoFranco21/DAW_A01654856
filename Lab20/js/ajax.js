$(document).ready(imprimir());

function imprimir(){
  $.post('tablaController.php')
  .done(function(data){
    $('#tablaFruits').html(data);
  });
}

$(document).ready(function(){
  $("#busquedaFruta").keyup(function(){
      $.get("frutasAjax.php",{ pattern: $('#busquedaFruta').val()})
      .done(function(data){
        $('#Registros').html(data);
        $('#Registros').show();
      });
  });
});

$(document).ready(function(){
  $("#formBorrar").submit(function (ev){
    ev.preventDefault();
     var nombre= $('#busquedaFruta').val();
     console.log(nombre);
     $.post('deleteController.php', { nameFruit : nombre } )
     .done(function(data){
       console.log(nombre);
       imprimir();
       $('#busquedaFruta').val(" ");
      })
      .fail(function(){
        imprimir();
        console.log('Error');
      });
    });
});

$(document).ready(function(){
  $("#insertarRegistro").submit(function (ev){
    ev.preventDefault();
     var nombre= $('#nFruit').val();
     var unidades= $('#uFruit').val();
     var cantidad= $('#qFruit').val();
     var precio= $('#pFruit').val();
     var pais= $('#cFruit').val();
     $.post('fruit.php', { nameFruit : nombre, unitsFruit : unidades, quantityFruit : cantidad, priceFruit : precio, countryFruit : pais } )
     .done(function(data){
       console.log(nombre);
       imprimir();
      })
      .fail(function(){
        imprimir();
        $('#nFruit').val(" ");
        $('#uFruit').val(" ");
        $('#qFruit').val(" ");
        $('#pFruit').val(" ");
        $('#cFruit').val(" ");
        console.log('Error');
      })
    });
});

function selectValueF(){
  var list=document.getElementById("listF");
  var userInput=document.getElementById("busquedaFruta");
  var ajaxResponse=document.getElementById("Registros");
  userInput.value=list.options[list.selectedIndex].text;
  $('#Registros').hide();
  userInput.focus();
}
