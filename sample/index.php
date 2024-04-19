<?php

require __DIR__ . '/vendor/autoload.php';

$url = 'http://test.loc/test/page.html';

$client = new \GuzzleHttp\Client();
$resp = $client->get($url);
$html = $resp->getBody()->getContents();

//echo $html;

$document = new \DiDom\Document();
$document->loadHtml($html);

/*$posts = $document->find('h2.blog-post-title');
foreach ($posts as $post) {
//    echo $post->text() . '<br>';
//    echo $post->html() . '<br>';
    echo $post->innerHtml() . '<br>';
}*/

/*//$names = $document->find('table.table tbody tr td:first-child');
$names = $document->find('table.table tbody tr td:nth-child(1)');
$upvotes = $document->find('table.table tbody tr td:nth-child(2)');
foreach ($names as $k => $name) {
    echo "{$name->text()}: {$upvotes[$k]->text()}<br>";
}*/

/*$widget = $document->first('h4.fst-italic');
var_dump($widget->nextSibling('p', 'DOMElement')->text());*/

/*$widget = $document->first('h4.fst-italic')->parent();
echo $widget->html();*/

/*if ($document->has('table.table')) {
    $names = $document->find('table.table tbody tr td:nth-child(1)');
    $upvotes = $document->find('table.table tbody tr td:nth-child(2)');
    foreach ($names as $k => $name) {
        echo "{$name->text()}: {$upvotes[$k]->text()}<br>";
    }
}*/

$archive_title = $document->first('h4.fst-italic:contains("Archives")');
$archive_list = $archive_title->nextSibling(null, 'DOMElement')->find('li a');
foreach ($archive_list as $item) {
    echo "{$item->text()} - {$item->attr('href')}<br>";
}
