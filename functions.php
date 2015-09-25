<?php

function index_searched($index,$type,$q)
{
    $indexed  = $client->index([
         'index' => $index,
         'type' => $type,
         'body' => [
         'user' => $user,
         'ip' => $ip,
         'searched' => $q
         ]
         ]);
    return $indexed;
}

function searched_keys($q)
{
    $keys = explode(" ",$q);
    $array_count = count(array_filter($keys));
    $final_keys = array_filter($keys);
    $return = array($array_count,$final_keys); 
    return $return;
}
?>