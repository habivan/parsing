<?php 

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

  function setQuery($data){
    $db = new PDO('mysql:host=localhost;dbname=pars', 'root', '');
    $company = $db->prepare("INSERT INTO company (name, num, href) values (:name, :num, :href)", $data);
    $company->execute($data);
    return $company;
  }
  
  function saveRow($row){
    $db = new PDO('mysql:host=localhost;dbname=pars', 'root', '');
    $company = $db->prepare("INSERT INTO company (name, num, href, date) values (:name, :num, :href, :date)");
    $company->execute(['num'=>$row['num'], 'name' => $row['name'], 'href' => $row['href'], 'date' => $row['date']]);
    foreach($row['docs'] as $doc){
      $docs = $db->prepare("INSERT INTO document (id_doc, name, href) values (:id_doc, :name, :href)");
      $docs->execute(['id_doc'=>$row['num'], 'name' => $doc['name'], 'href' => $doc['href']]);
    }
    return $company;
  }
