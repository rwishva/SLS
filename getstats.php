<?php
require_once 'init.php';
$index = "sls";
$type = "views";
$id = "AVBv39AEYBRh9cklu78w";
$getParams = array();
$getParams['index'] = $index;
$getParams['type']  = $type;
$getParams['id']    = $id;
$retDoc = $client->get($getParams);
echo  $retDoc['_source']['views'];
?>