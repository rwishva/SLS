<?php
    session_start();
    require_once 'init.php';
    include_once 'functions.php';
    
    #require 'validatesession.php';
           
?>
 <!-- From here all HTML coding can be done -->
<html>
    <head>
        
        <link href='/SLS/css/bootstrap.min.css' rel='stylesheet'>
        <link rel='stylesheet' type='text/css' href='/SLS/css/bstyle.css' />
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
                            <input type="text" class="form-control"  placeholder="Search" name="q">
                            <span class="input-group-addon">
                                <button type="submit">
                                    <span class="glyphicon">Search</span>
                                </button>  
                            </span>
                        </div>
                    </div>
        </div>
      </form>



    </div>
    <div class="col-sm-2">
      
      <form action="add.php">
            <button type="submit" class="btn btn-default navbar-btn" id="indexbtn">Index Your Links</button>
          </form>

          <form action="add.php">
            <button type="submit" class="btn btn-default navbar-btn" id="gold"><strong>Index Your Links</strong></button>
          </form>




    </div>
      
  </div>

  <div class="row" id="searchbar">
      <div class="col-sm-2 results">
        <div class="panel panel-default">
            <div class="panel-body">
            <button type="button" class="btn btn-success btn-sm">Small button</button>

          </div>
        </div>


      </div>
      <div class="col-sm-6 results">
             
          <div id="resbox">
   <?php
              if(isset($_GET['q']))
              if($_GET['q']!=null)
              {
                      $q = $_GET['q'];
                      $user = 'notlogged';
                      $ip = $_SERVER['REMOTE_ADDR'];
                      if(isset($_SESSION['luser']))
                      $user = $_SESSION['luser'];   
                       
                      $index = "srilanka";
                      $type = "searches";
                      $keys = explode(" ",$_GET['q']);
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

                     $params = [
                            'index' => 'srilanka',
                            'type' => 'links',
                            'body' => [
                                        'query' => [
                                            'bool' => [ 
                                                'should' => [ 
                                                                ['match' => ['_all' => $q]]
                                    //['match' => ['keywords' => $q]],
                                    //['match' => ['title' => $q]]
                                ]
                            ]
                        ]
                    ]
                ];




                 }
                   elseif($_GET['q']==null) {

                      $params = [
                            'index' => 'srilanka',
                            'type' => 'links',
                            'body' => [
                                        'query' => [
                                            'bool' => [ 
                                                'should' => [ 
                                                               // ['match' => ['_all' => $q]]
                                    ['match' => ['user' => 'rangana']],
                                    //['match' => ['title' => $q]]
                                ]
                            ]
                        ]
                    ]
                ];
                     # code...
                   }
                  
           
                      
            
                  #$params = "['index' => 'srilanka','type' => 'links','body' => ['query' => ['bool' => [ 'should' => [['match' => ['_all' => 'this']],['match' => ['_all' => 'is']],['match' => ['_all' => 'fuck']]]]]]]";
                  #echo $params;
                  $response = $client->search($params);
                  
                   echo "<div id='title'>";
                   // echo "<a id='res' style='text-decoration: none'>Results From CC</a>";
                   echo "</div>";
                  if($response['hits']['total']>0)
                  {
                    $results_count = $response['hits']['total'];
                   $results = $response['hits']['hits'];
                   $took = $response['took'];
                   $took = $took/1000;
                   
                   echo "<div class='results'>";   
                   //echo '<pre>', print_r($response), '</pre>';
                   //die;
                   
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
                          echo "<a id='res' href='SLS/' style='text-decoration: none'>".ucfirst($r['_source']['tittle'])."</a>";
                          echo "<br>";
                          }
                          if(isset($r['_source']['host'])){
                          echo "<a class='host' style='color: #006621'>".$r['_source']['host']."</a>";
                          echo "<br>";
                          }   
                          echo "<a class='description' style='color: #545454'>".$r['_source']['description']."</a>";
                          echo "<br>";
                          echo "<a class='keywords' style='color: #545454'>Tags :".implode(', ',$r['_source']['keywords'])."</a>";
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
              
              // else {
              //         echo "<div class='center'>";
              //         echo "We Have Nothing to Search :/";
              //         echo "</div>";
              // }
          ?>

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
            <div class="panel-body center">
            
                
           <div class="centering text-center pull-right">
      <!-- <div class="alert alert-warning pull-right" role="alert" id="showinfo">This is test message</div> -->

      <div class="serp-safety serp-insert">
        <div class="ui-info-box row stay-safe-box">
          <div class="col-12">
          <p><strong>Note :</strong>This site is under construction</p>
            
            
          </div>
         </div>
       </div>
    </div>



          </div>
        </div>
        </div>
  </div>

</div>
                      </div>
                    
                    <?php include 'footer.php';?>
                    </body>
                    
            </html>

