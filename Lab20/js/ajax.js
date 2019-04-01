function getRequestObject(){
  if(window.XMLHttpRequest){
    return (new XMLHttpRequest)
  } else if(window.ActiveXObject){
    return (new ActiveXObject("Microsoft.XMLHTTP"));
  } else{
    return null;
  }
}

$(document).ready(function(){
  $("#busquedaFruta").keydown(function(){
    $.get("frutasAjax.php?pattern="+$("#busquedaFruta").val(), "yellow");
  });
});

function sendRequestF(){
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
}

function selectValueF(){
  var list=document.getElementById("listF");
  var userInput=document.getElementById("busquedaFruta");
  var ajaxResponse=document.getElementById("Registros");
  userInput.value=list.options[list.selectedIndex].text;
  ajaxResponse.style.visibility="hidden";
  userInput.focus();
}
