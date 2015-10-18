<?php
require_once 'init.php';
if (isset($_POST['idxid'])) {
	 $updateone = [
  'retry_on_conflict' =>'10',
  'index' => 'sls',
  'type' => 'links',
  'id' => $_POST['idxid'],
  'body' => [
    'script' => 'ctx._source.views+=1',
    'upsert' => [
    'views' => 0
  ]
  ]
];

$updone = $client->update($updateone);
}
else{
 $updateone = [
  'index' => 'sls',
  'type' => 'views',
  'id' => 'AVBxSTVE9c3z1bIPpMOi',
  'body' => [
    'script' => 'ctx._source.views+=1'
  ]
];

$updone = $client->update($updateone);
}
?>