/*function getRequestObject(){
  if(window.XMLHttpRequest){
    return (new XMLHttpRequest)
  } else if(window.ActiveXObject){
    return (new ActiveXObject("Microsoft.XMLHTTP"));
  } else{
    return null;
  }
}*/

//function sendRequestF(){
  //console.log('sendRequest');
$(document).ready(function(){
  $("#busquedaFruta").keyup(function(){
      $.get("frutasAjax.php",{ pattern: $('#busquedaFruta').val()})
      .done(function(data){
        //console.log("Input text = " + $('#busquedaFruta').val());
        //console.log(data);
        $('#Registros').html(data);
        $('#Registros').show();
      });
  });
});

$(document).ready(function(){
  $("formBorrar").submit(function (ev){
    ev.preventDefault();
     var nombre= $('#busquedaFruta').val();
     console.log(nombre);
     $.post('deleteController.php', { nameFruit : nombre } )
     /*$.ajax({
       url: 'guardar.php',
       type: 'POST',
       data:{id_lugar:lugar,id_incidente:incidente},
       dataType:'text',
     })*/
     .done(function(data){
       console.log(nombre);
       imprimir(data);
      })
      .fail(function(){
        imprimir(data);
        console.log('Error');
      });
    });
});

$(document).ready(imprimir());

function imprimir(data){
  $.post('tablaController.php')
  .done(function(data){
  $('#tablaFruits').html(data);
  });
}
//}

/*function sendRequestF(){
  request=getRequestObject();
  if(request!=null){
    var userInput=document.getElementById('busquedaFruta');
    var url='frutasAjax.php?patternF='+userInput.value;
    request.open('GET',url,true);
    request.onreadystatechange=
      function(){
        if(request.readyState==4){
          var ajaxResponse=document.getElementById('Registros');
          ajaxResponse.innerHTML=request.responseText;
          ajaxResponse.style.visibility="visible";
        }
      };
    request.send(null);
  }
}*/

function selectValueF(){
  var list=document.getElementById("listF");
  var userInput=document.getElementById("busquedaFruta");
  var ajaxResponse=document.getElementById("Registros");
  userInput.value=list.options[list.selectedIndex].text;
  //ajaxResponse.style.visibility="hidden";
  $('#Registros').hide();
  userInput.focus();
}
