  <?php
  require_once 'init.php';
  include_once 'functions.php';
              if(isset($_GET['q']))
              {
              if($_GET['q']!=null)
              {
                      $q = $_GET['q'];
                      $user = 'notlogged';
                      $ip = $_SERVER['REMOTE_ADDR'];
                      if(isset($_SESSION['luser']))
                      $user = $_SESSION['luser'];   
                       
                      $index = "sls";
                      $type = "searches";
                      $keys = explode(" ",$_GET['q']);
                      $keys_count = count($keys);
                      if (!isset($_GET['idx'])) 
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
                      }

                     $params = [
                                  'index' => 'sls',
                                  'type' => 'links',
                                  'body' => [
                                              'query' => 
                                              [
                                                  'bool' => 
                                                  [ 
                                                    'should' => 
                                                    [ 
                                                      ['match' => 
                                                        ['_all' => $q]
                                                      ]
                                                    ]
                                                  ]      
                                              ]
                                            ]
                                ];

                                // $params = [
                                //   'index' => 'sls',
                                //   'type' => 'links',
                                //   'body' => [
                                //               'filtered'=> [
                                //                   'query'=> [
                                //                               'match_all'=> []
                                //                             ]
                                //                   ] 
                                //                 ]
                                //               ];
              }
                  else {

                      $params = [
                            'index' => 'sls',
                            'type' => 'links',
                            'body' => [
                                        'query' => [
                                            'bool' => [ 
                                                'should' => [ 
                                                               ['match' => ['_all' => $q]]
                                    // ['match' => ['user' => 'rangana']],
                                    //['match' => ['title' => $q]]
                                      ]
                                  ]
                              ]
                          ]
                      ];
                  }

               }
               else {

                      $params = [
                            'index' => 'sls',
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
                  }
                  
           
                      
            
                  #$params = "['index' => 'srilanka','type' => 'links','body' => ['query' => ['bool' => [ 'should' => [['match' => ['_all' => 'this']],['match' => ['_all' => 'is']],['match' => ['_all' => 'fuck']]]]]]]";
                  #echo $params;
                  $response = $client->search($params);
                  // header("content-type: text/html; charset=UTF-8");  
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
                   
                   // die;
                   
                   if($results_count<10){
                   echo "<a style='color: #808080'>First ".$results_count." of ".$results_count." results (".$took." seconds)</a>";
                   }
                   else{
                   echo "<a style='color: #808080'>First 10 of ".$results_count." results (".$took." seconds)</a>";    
                   }
                   echo "<br>";
                   echo "<br>";
                   // echo "<div class='adbox'>this is reserved for adds</div>";
                   foreach($results as $r)
                   {
                          if(isset($r['_source']['typeoflink'])){
                            if ($r['_source']['typeoflink']=='video') {
                              $youtubelink = str_replace("watch?v=","embed/",$r['_source']['link']);
                              $youtubelink = explode('https://www.youtube.com/watch?v=',$r['_source']['link']);
                              // print_r($youtubelink);
                              echo "<a id='res' href=video.php?video=".$youtubelink[1]." style='text-decoration: none'>".ucfirst($r['_source']['tittle'])."</a>";
                            }
                          
                          echo "<br>";
                          }
                          else{
                            if($r['_source']['link']){
                            echo "<a id='res' href=".$r['_source']['link']." style='text-decoration: none'>".ucfirst($r['_source']['tittle'])."</a>";
                            echo "<br>";
                            }else{
                            echo "<a id='res' href='SLS/' style='text-decoration: none'>".ucfirst($r['_source']['tittle'])."</a>";
                            echo "<br>";
                            }
                          }
                          if(isset($r['_source']['host'])){
                          echo "<a class='host' style='color: #006621'>".$r['_source']['host']."</a>";
                          echo "<br>";
                          }   

                          echo "<p class='description' style='color: #545454'>".$r['_source']['description']."</p>";
                          // echo "<br>";
                          echo "<a class='keywords' style='color: #545454'>Tags :<span class='label label-info'>".strtolower(implode('</span> <span class="label label-info">',$r['_source']['keywords']))."</span></a>";
                          if(isset($r['_source']['typeoflink'])){
                            if ($r['_source']['typeoflink']=='video') {
                              echo "<a class='keywords' href='video.php?video=".$youtubelink[1]."'' style='color: #545454'> <span class='label label-danger'>video</span></a>";
                            }
                          }
                          echo "<br>";
                          echo "<br>";
                   }
                   // echo '<pre>', print_r($response), '</pre>';
                   echo "</div>";
                  }
                  else {
                          echo "<div class='left'>";
                          echo "Sorry No Results found  :(";
                          echo "</div>";
                      }
              
              // else {
              //         echo "<div class='center'>";
              //         echo "We Have Nothing to Search :/";
              //         echo "</div>";
              // }
          ?>