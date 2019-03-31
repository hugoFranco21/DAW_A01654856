function getRequestObject(){
  if(window.XMLHttpRequest){
    return (new XMLHttpRequest)
  } else if(window.ActiveXObject){
    return (new ActiveXObject("Microsoft.XMLHTTP"));
  } else{
    return null;
  }
}

function sendRequest(){
  request=getRequestObject();
  if(request!=null){
    var userInput=document.getElementById('userInput');
    var url='ssajax.php?pattern='+userInput.value;
    request.open('GET',url,true);
    request.onreadystatechange=
      function(){
        if(request.readyState==4){
          var ajaxResponse=document.getElementById('ajaxResponse');
          ajaxResponse.innerHTML=request.responseText;
          ajaxResponse.style.visibility="visible";
        }
      };
    request.send(null);
  }
}

function selectValue(){
  var list=document.getElementById("list");
  var userInput=document.getElementById("userInput");
  var ajaxResponse=document.getElementById("ajaxResponse");
  userInput.value=list.options[list.selectedIndex].text;
  ajaxResponse.style.visibility="hidden";
  userInput.focus();
}
