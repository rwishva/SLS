<?php

 session_start();
 require_once 'init.php';
 usleep(1);


 if(!empty($_POST))
    if(isset($_POST['title'],$_POST['description'],$_POST['keywords'],$_POST['link']))
    {
            
             
        
            $tittle = $_POST['title'];
            $description = $_POST['description'];
            $link = $_POST['link'];
            $keywords = explode(',',$_POST['keywords']);
            $ip = $_SERVER['REMOTE_ADDR'];
            $user = $_SESSION['luser'];
            $index = "sls";
            $type = "links";
            

            // try {
            //     parse_url($link);
            // } catch (Exception $e) {
            //    echo 'Caught exception: ',  $e->getMessage(), "\n";
            //     $return = array('type'=>'error', 'message'=>$e->getMessage());
            //     echo json_encode($return);
            //     die;
            // }

       $decoded_url = parse_url($link);
       if(!isset($decoded_url['scheme']))
       {
        $return = array('type'=>'error', 'message'=>'Sorry ! , Please provide a valid link');
        echo json_encode($return);
        die;
       }
       $scheme = $decoded_url['scheme'];
       $host = $decoded_url['host'];
       $path = $decoded_url['path'];
           
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

        // "postDate" : {
        //         "type" : "date",
        //         "format" : "YYYY-MM-dd mm:hh:ss"
        //     }
         
         
         //   $indexed  = $client->index([
         // 'index' => $index,
         // 'type' => $type,
         // 'body' => [
         // 'user' => $user,
         // 'ip' => $ip,
         // 'tittle' => $tittle,
         // 'link' => $link,
         // 'description' =>  $description,
         // 'keywords' => $keywords
         // ] 
         // ]);
         
         
         if($indexed){
            $return = array('type'=>'success', 'message'=>'Your Links are being indexed !');
            // $return = array('type'=>'success', 'message'=>var_dump($indexed));
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