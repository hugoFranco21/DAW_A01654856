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

  $("formBorrar").submit(function (event){
    event.preventDefault();
    var $form = $( this ),
    term = $form.find( "input[name='nameFruit']" ).val(),
    url = $form.attr( "action" );


    // Send the data using post
    var posting = $.post( url, { nameFruit: term })
    //.done()
  });
  /*$("#listF").click(function(){
    console.log($(this).val());
    $('#busquedaFruta').val($("#listF").val());//, function(){
      //$('#listF').hide("fast",
        //function(){$('#busquedaFruta').focus();
        //});
      //});
    });*/

});
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
