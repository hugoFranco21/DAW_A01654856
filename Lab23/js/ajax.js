$(document).ready(function(){
  $("#insertarRegistro").submit(function (ev){
    ev.preventDefault();
    var uproducto= $('#producto').val();
    var ucliente= $('#nombre_cliente').val();
    var unumero= $('#street_number').val();
    var ucalle= $('#route').val();
    var uciudad= $('#locality').val();
    var uestado= $('#administrative_area_level_1').val();
    var ucp= $('#postal_code').val();
    var urepartidor= $('#nombre_repartidor').val();
     $.post('insertController.php', { producto : uproducto, nombre_cliente : ucliente, numero : unumero, calle : ucalle, ciudad : uciudad, estado : uestado, cp : ucp, nombre_repartidor : urepartidor } )
     .done(function(data){
       console.log("Correcto");
       $('#producto').val("");
       $('#nombre_cliente').val("");
       $('#street_number').val("");
       $('#route').val("");
       $('#locality').val("");
       $('#administrative_area_level_1').val("");
       $('#postal_code').val("");
       $('#nombre_repartidor').val("");
       $('#street_number').prop("disabled", true);
       $('#route').prop("disabled", true);
       $('#locality').prop("disabled", true);
       $('#administrative_area_level_1').prop("disabled", true);
       $('#postal_code').prop("disabled", true);
       $('#autocomplete').val("");
       alert('Inserción realizada');
      })
      .fail(function(){
        alert('Inserción no realizad, revise los datos anotados');
        console.log('Error');
      });
    });
});

/*$(document).ready(function(){
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
}*/
