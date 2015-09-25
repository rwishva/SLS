<?php
    session_start();
    #require_once 'init.php';
    include_once 'functions.php';
    
    #require 'validatesession.php';
           
?>
 <!-- From here all HTML coding can be done -->
<html>
    <head>
        
        <link href='/slgle/roogle/css/bootstrap.min.css' rel='stylesheet'>
        <link rel='stylesheet' type='text/css' href='/slgle/roogle/css/bstyle.css' />
    	<!-- <link href="css/style.css" rel="stylesheet"> -->
    </head>
        <body>
                
                <?php include 'header.php';?>



 <div class="container-fluid">

 	 <div class="row" id="searchbar">
  	<div class="col-sm-1">
    </div>
  		<div class="col-sm-9">
		  	<form>
		  		<div class="centering text-center" id="searchbox">

				  			<div id="imaginary_container"> 
				                <div class="input-group stylish-input-group">
				                    <input type="text" class="form-control"  placeholder="Search" >
				                    <span class="input-group-addon">
				                        <button type="submit">
				                            <span class="glyphicon">Search</span>
				                        </button>  
				                    </span>
				                </div>
				            </div>
				  		<!-- 
				  			<input type="text" class="form-control" id="usr" placeholder="Search" name="field"/>
				            
				            <button type="submit" class="btn btn-primary" name="submit" id="submit" value="q">Hit Me</button>
 -->
				</div>
			</form>



		</div>
    <div class="col-sm-2">
      <div class="centering text-center pull-right">
      <!-- <div class="alert alert-warning pull-right" role="alert" id="showinfo">This is test message</div> -->
       <form action="add.php">
            <button type="submit" class="btn btn-default navbar-btn" id="indexbtn">Index Your Links</button>
          </form>
      <div class="serp-safety serp-insert">
        <div class="ui-info-box row stay-safe-box">
          <div class="col-12">
            
            <p><strong>Note :</strong>This site is under construction...</p>
          </div>
         </div>
       </div>
    </div>
    </div>
      
	</div>

	<div class="row" id="searchbar">
  		<div class="col-sm-2 results">
        <div class="panel panel-default">
            <div class="panel-body">
            Basic panel example

          </div>
        </div>


      </div>
  		<div class="col-sm-6 results">
		  		   
					<div id="resbox">
   <h1>fgjdkfghjhgf</h1>  
    <h1>fgjdkfghjhgf</h1>  
     
    <h1>fgjdkfghjhgf</h1> 

    <h1>fgjdkfghjhgf</h1> 
     <h1>fgjdkfghjhgf</h1> 

    <h1>fgjdkfghjhgf</h1>
    <h1>Edited in web</h1>
    <h1>Edited in local machine</h1>

<nav>
  <ul class="pagination">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>



					</div>

				
		</div>
    		<div class="col-sm-4 results">

          <div class="panel panel-default">
            <div class="panel-body">
            Basic panel example

          </div>
        </div>
        </div>
	</div>

</div> 

  <div id="wrap">            
  


 
                    
<?php
    if(isset($_GET['field']))
    if($_GET['field']!=null)
    {
            $q = $_GET['field'];
            $user = 'notlogged';
            $ip = $_SERVER['REMOTE_ADDR'];
            if(isset($_SESSION['luser']))
            $user = $_SESSION['luser'];   
             
            $index = "srilanka";
            $type = "searches";
            $keys = explode(" ",$_GET['field']);
            $keys_count = count($keys);
         
         $indexed  = $client->index([
         'index' => $index,
         'type' => $type,
         'body' => [
         'user' => $user,
         'ip' => $ip,
         'searched' => $q
         ]
         ]);
         
         /*
            $params_header = "['index' => 'srilanka','type' => 'links','body' => ['query' => ['bool' => [ 'should' => [";
            $params_footer = "]]]]]";
            $res  = searched_keys($q);
            $keyword_count = $res[0];
            $keywords = $res[1];
            switch ($keyword_count){
            case 1: $params_body = ['match' => ['_all' => $keywords[0]]];
                    break;
            case 2: $params_body = "['match' => ['_all' => ".$keywords[0]."]],['match' => ['_all' => ".$keywords[1]."]]";
                    break;
            case 3: $params_body = "['match' => ['_all' => ".$keywords[0]."]],['match' => ['_all' => ".$keywords[1]."]],['match' => ['_all' => ".$keywords[2]."]]";
                    break; 
            case 4: $params_body = "['match' => ['_all' => ".$keywords[0]."]],['match' => ['_all' => ".$keywords[1]."]],['match' => ['_all' => ".$keywords[2]."]],['match' => ['_all' => ".$keywords[3]."]]";
                    break; 
            case 5: $params_body = "['match' => ['_all' => ".$keywords[0]."]],['match' => ['_all' => ".$keywords[1]."]],['match' => ['_all' => ".$keywords[2]."]],['match' => ['_all' => ".$keywords[3]."]],['match' => ['_all' => ".$keywords[4]."]]";
                    break;
            default :    
                    $params_body = "['match' => ['_all' => ".$keywords[0]."]]";   
                    }

            $params = $params_header.$params_body.$params_footer;
          */
        
 
        $params = [
            'index' => 'srilanka',
            'type' => 'links',
            'body' => [
                        'query' => [
                            'bool' => [ 
                                'should' => [ 
                                                ['match' => ['_all' => $q]]
                    // ['match' => ['keywords' => $q]],
                    // ['match' => ['title' => $q]]
                ]
            ]
        ]
    ]
];
  
        #$params = "['index' => 'srilanka','type' => 'links','body' => ['query' => ['bool' => [ 'should' => [['match' => ['_all' => 'this']],['match' => ['_all' => 'is']],['match' => ['_all' => 'fuck']]]]]]]";
        #echo $params;
        $response = $client->search($params);
        
         echo "<div id='title'>";
         echo "<a id='res' style='text-decoration: none'>Results From CC</a>";
         echo "</div>";
        if($response['hits']['total']>0)
        {
          $results_count = $response['hits']['total'];
         $results = $response['hits']['hits'];
         $took = $response['took'];
         $took = $took/1000;
         
         echo "<div class='results'>";   
         // echo '<pre>', print_r($response), '</pre>';
         // die;
         
         if($results_count<10){
         echo "<a style='color: #808080'>First ".$results_count." of ".$results_count." results (".$took." seconds)</a>";
         }
         else{
         echo "<a style='color: #808080'>First 10 of ".$results_count." results (".$took." seconds)</a>";    
         }
         echo "<br>";
         echo "<br>"; 
         foreach($results as $r)
         {
                if($r['_source']['link']){
                echo "<a id='res' href=".$r['_source']['link']." style='text-decoration: none'>".ucfirst($r['_source']['tittle'])."</a>";
                echo "<br>";
                }else{
                echo "<a id='res' href='/slgle/roogle/' style='text-decoration: none'>".ucfirst($r['_source']['tittle'])."</a>";
                echo "<br>";
                }
                if(isset($r['_source']['host'])){
                echo "<a class='host' style='color: #006621'>".$r['_source']['host']."</a>";
                echo "<br>";
                }   
                echo "<a class='description' style='color: #545454'>".$r['_source']['description']."</a>";
                echo "<br>";
                echo "<a class='keywords' style='color: #545454'>".implode(', ',$r['_source']['keywords'])."</a>";
                echo "<br>";
                echo "<br>";
         }
         echo "</div>";
        }
        else {
                echo "<div class='center'>";
                echo "Sorry No Results found  :(";
                echo "</div>";
            }
        
        
        
/*        
   $aContext = array(
    'http' => array(
        'proxy' => 'tcp:/172.22.20.64:808',
        'request_fulluri' => true,
    ),
);
        $cxContext = stream_context_create($aContext);   
        
        $query = "'.$q.'&userip=172.22.20.76&start=8&rsz=large";
        /$url = "http:/www./slgle/roogle.com/search?oe=utf8&ie=utf8&source=uds&start=0&hl=en&q=Paris+Hilton" ;
        $url = "http:/ajax./slgle/roogleapis.com/ajax/services/search/web?v=1.0&q=".$query;

        $body = file_get_contents($url,false,$cxContext);
        $json = json_decode($body);
        /echo '<pre>', print_r($json), '</pre>';
        /die;

        $gresults = $json->responseData->results;
        echo "<div id='title'>";
        echo "<a id='res' style='text-decoration: none'>Results From /slgle/roogle</a>";
        echo "</div>";
        echo "<div class='center'>";
        foreach($gresults as $gr)
         {
            echo "<a id='res' href='$gr->url' style='text-decoration: none'>".$gr->url."</a>";
            echo "<br>";
            echo "<a style='color: #006621'>".$gr->visibleUrl."</a>";
            echo "<br>";   
            echo "<a style='color: #545454'>".$gr->title."</a>";
            echo "<br>";
            echo "<a style='color: #545454'>".$gr->content."</a>";
            echo "<br>";
            echo "<br>";
         }
           echo "</div>";
      */  
        
        /*
        $search_sql = "select * from users where username like '%".$_GET['field']."%' ";
        $search_sql_query = mysqli_query($conn,$search_sql);
        if(mysqli_num_rows($search_sql_query)!=0){
            echo "<div class='center'>";
            $rs=mysqli_fetch_assoc($search_sql_query);
            do { ?>
            <p><?php    
                        echo "<a id='res' href='/slgle/roogle/index.php' style='text-decoration: none'>".ucfirst($rs['username'])."</a>";
                        echo "<br>";
                        echo "<a style='color: #006621'>".$rs['ip']."</a>";
                        echo "<br>";
                        echo "<a style='color: #545454'>".$rs['lastlogin']."</a>";
                        echo "<br>";
            
                        ?></p> 
            
                    <?php } while($rs=mysqli_fetch_assoc($search_sql_query));
                    echo "</div>";
                    ?>
                    <?php
            }
            else {
                echo "<div class='center'>";
                echo "Sorry No Results found  :(";
                echo "</div>";
            } */
    }
    else {
            echo "<div class='center'>";
            echo "We Have Nothing to Search :/";
            echo "</div>";
    }
    ?>
                    
                    </div>
                      </div>
                    
                    <?php include 'footer.php';?>
                    </body>
                    
            </html>

