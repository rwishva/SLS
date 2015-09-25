<?php
              if(isset($_GET['q']))
              if($_GET['q']!=null)
              {
                   
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
                          echo "<a id='res' href='roogle/' style='text-decoration: none'>".ucfirst($r['_source']['tittle'])."</a>";
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