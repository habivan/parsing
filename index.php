<meta charset="utf-8">
<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 'on');
	mb_internal_encoding('UTF-8');
	require_once __DIR__.'/vendor/autoload.php';
  require_once 'func.php';
  require_once 'core/pdo.php';
	use DiDom\Document;

  $url = 'https://com.ru-trade24.ru/query/Filter';

  $document = new Document();
  $cart = didDomPars($url, '.trade-card');

  $element = [];
  foreach($cart as $n){
    $num = preg_replace("/[^0-9]/", '', $n->first('.trade-card__type')->text());
    $element[$num]['name'] = $n->first('.trade-card__name')->text();
    $element[$num]['num'] = $num;
    $element[$num]['href'] =  'https://com.ru-trade24.ru'.$n->first('a')->attr('href');
  }

  foreach($element as $elem){
    $container = didDomPars($elem['href'], 'body');
    $product = $container[0]->first('label[for="PartpApplicationDateTimeBegin"]');
    if($product){
      $data = $product->parent()->first('.info__title')->text(); 
      $d = DateTime::createFromFormat('d.m.Y H:i', $data);
      $element[$elem['num']]['date'] = $d->format('Y-m-d H:i:s');
    }
    $document = $container[0]->first('#blockdoc');
    $file = $document->find('a.doc');
    $docs = [];
    foreach($file as $doc){
      $d = ['name' => $doc->text(), 'href' => 'https://com.ru-trade24.ru'.$doc->attr('href')];
      $element[$elem['num']]['docs'][] = $d;
    }
  }
  
  // foreach($element as $elem){
  //   saveRow($elem);
  // }




  

