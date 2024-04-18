<?php 
function removeSpaces($arr){
    $mas = explode('  ', $arr);
    $cleanArr = [];
    foreach($mas as $a){
      $a = trim($a);
      if($a !== ''){
        $cleanArr[] = $a;
      }
    }
    return $cleanArr;
  }

  function pr($arr){
      echo '<pre>';
    print_r($arr);
    echo '</pre>';
  }
  
  function prd($arr){
      echo '<pre>';
    print_r($arr);
    echo '</pre>';
        die;
  }