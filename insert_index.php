<?php
 session_start();
 require_once 'init.php';
 if (!isset($_SESSION['luser'])) {
    require 'validatesession.php';
 }
 usleep(2000000);
 if(!empty($_POST))
    if(isset($_POST['title'],$_POST['description'],$_POST['keywords'],$_POST['link']))
    {
            
            
        
            $tittle = $_POST['title'];
            $description = $_POST['description'];
            $link = $_POST['link'];
            $keywords = explode(',',$_POST['keywords']);
            $ip = $_SERVER['REMOTE_ADDR'];
            $user = $_SESSION['luser'];
            $index = "srilanka";
            $type = "links";
            
            $blah = parse_url($link);
            $scheme = $blah['scheme'];
            $host = $blah['host'];
            $path = $blah['path'];
            
            #print_r($blah);
           // $time = date('Y-m-d H:i:s');
           
         
         $indexed  = $client->index([
         'index' => $index,
         'type' => $type,
         'body' => [
         'user' => $user,
         'ip' => $ip,
         'tittle' => $tittle,
         'link' => $link,
         'scheme' => $scheme,
         'host' => $host,
         'path' => $path,
         'description' =>  $description,
         'keywords' => $keywords
         ] 
         ]);
         echo $indexed; 
         if($indexed){
            #$return = array('type'=>'success', 'message'=>'Your Links are being indexed !');
            $return = array('type'=>'success', 'message'=>var_dump($indexed));
         }
         else{
            $return = array('type'=>'error', 'message'=>'Oops something went wrong please try again!');
         }
        echo json_encode($return);
         //print_r($indexed);
    }
    else 
    {  
        $return = array('type'=>'success', 'message'=>'OK');
        
        echo json_encode($return); 
    }
    
?>