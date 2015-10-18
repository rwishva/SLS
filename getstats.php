<?php
require_once 'init.php';
$index = "sls";
$type = "views";
$id = "AVBxSTVE9c3z1bIPpMOi";
$getParams = array();
$getParams['index'] = $index;
$getParams['type']  = $type;
$getParams['id']    = $id;

$params['index'] = $index;
$params['type']  = "links";

$paramssearches['index'] = $index;
$paramssearches['type']  = "searches";

$retDoc = $client->get($getParams);
// $esstats = $client->indices()->stats();
$slslinks = $client->count($params)["count"];  
$slssearches = $client->count($paramssearches)["count"]; 

$return['searches'] = $slssearches;
$return['indexes'] = $slslinks;  
// $return['indexes'] = $esstats['indices']['sls']['total']['docs']['count']; 
$return['views'] = $retDoc['_source']['views'];
// $return = array('type'=>'views', 'message'=>$retDoc['_source']['views']);
echo json_encode($return); 
?>