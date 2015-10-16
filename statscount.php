<?php
require_once 'init.php';

 $updateone = [
  'index' => 'sls',
  'type' => 'views',
  'id' => 'AVBv39AEYBRh9cklu78w',
  'body' => [
    'script' => 'ctx._source.views+=1'
  ]
];

$updone = $client->update($updateone);

?>