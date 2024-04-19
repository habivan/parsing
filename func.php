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

  function parsing($url){
    $client = new \GuzzleHttp\Client(['verify' => false]);
    $html =  $client->request('POST', $url, 
    [    
      'form_params' => 
        [         
          'MainPageFilterTradeStatus' => '7'
        ]
    ]
  );
  return $html->getBody()->getContents();
  }

  function didDomPars($url, $class){
    $document = new DiDom\Document();
    $document->loadHtml(parsing($url));
    return $document->find($class);
  }
