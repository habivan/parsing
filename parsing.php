<meta charset="utf-8">
<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 'on');
	mb_internal_encoding('UTF-8');
	require_once __DIR__.'/vendor/autoload.php';
  require_once 'func.php';
	use DiDom\Document;

  $url = 'https://com.ru-trade24.ru/query/Filter';
  $client = new \GuzzleHttp\Client(['verify' => false]);
  $response = $client->request('POST', $url, 
  [    
    'form_params' => 
      [         
        'MainPageFilterTradeStatus' => '7'
      ]
  ]
);

  $html = $response->getBody()->getContents();
  $document = new Document();
  $document->loadHtml($html);
  $cart = $document->find('.trade-card');

  $element = [];
  foreach($cart as $n){
    $num = preg_replace("/[^0-9]/", '', $n->first('.trade-card__type')->text());
    $element[$num]['name'] = $n->first('.trade-card__name')->text();
    $element[$num]['num'] = $num;
    $element[$num]['href'] =  'https://com.ru-trade24.ru/'.$n->first('a')->attr('href');
  }

pr($element);



