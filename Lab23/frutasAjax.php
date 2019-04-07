<?php
  require_once('util.php');
  $pattern=strtolower($_GET['pattern']);
  $words=getFruitName();
  //var_dump($words);
  //die();
  $response="";
  $size=0;
  //$num=mysqli_num_rows($result);
  for($i=0;$i < count($words); $i++){
    $fruta=
    $pos=stripos(strtolower($words[$i]),$pattern);
    if(!($pos===false)){
      $size++;
      $word=$words[$i];
      $response.="<option value=\"$word\">$word</option>";
    }
  }
  if($size > 0){
    echo "<select id=\"listF\" size=$size onclick=\"selectValueF()\">$response</select>";
    //echo "<select id=\"listF\" size=$size >$response</select>";
  }
?>
