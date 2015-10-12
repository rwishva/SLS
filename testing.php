<?php
$link = "https://www.google.lk/?gfe_rd=cr&ei=GJEWVqiiArDG8AeczLTwCA#q=php+when+die+connection+reset";
$decoded_url = parse_url($link);
       if(isset($decoded_url['scheme']))
       {
        echo $decoded_url['scheme'];
        die;
      }
      die;

?>



<!--

<html>
<head>
<link rel='stylesheet' type='text/css' href='/google/css/style.css' />
</head>
    <body> 
        <form>
        <input placeholder="Search" id="field" name="field" type="text" />

        <input id="submit" name="submit" type="submit" value="Search" />
        </form>
    <body>
<html>
  -->
<!-- 
  include_once('simple_html_dom.php');
$default_opts = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"Accept-language: en\r\n" .
              "Cookie: foo=bar",
              'proxy'=>"tcp://172.22.20.64:808",
              'request_fulluri' => true
  )
);

//$default = stream_context_set_default($default_opts);
$cxContext = stream_context_create($default_opts);

// Now all file stream functions can use this context.

$sFile = file_get_html("http://www.makeuseof.com/tag/build-webcrawler-part-2/", false, $cxContext);
# echo $sFile;
foreach($sFile->find('img') as $img)
{
echo $img->src."<br />";
//echo "http://php.net".$img."<br/>";
//echo $img;
} -->
