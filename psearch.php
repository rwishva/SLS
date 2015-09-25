<?php
    session_start();
    require_once 'init.php';
    if (!isset($_SESSION['luser'])) {
    require 'validatesession.php';
    } 
        
?>
            <!-- From here all HTML coding can be done -->
            <html>
            <head>
            <title>What Others Search</title>
            <link rel='stylesheet' type='text/css' href='/roogle/css/bstyle.css' />
            <link href='/roogle/css/bootstrap.min.css' rel='stylesheet'>
            </head>
            <body>
                
                <?php include 'header.php';?>
                <div id="title"><h1>Srigle/Trends</h1></div>
                
                <div class="center">
                <div id="searchContainer">
                    <form>
                    <input placeholder="Search" id="field" name="field" type="text" />
                    
                    <input id="submit" name="submit" type="submit" value="Search" />
                    </form>
                    </div>
                    </div>
                    <?php include 'footer.php';?>
                    </body>
            </html>

<?php
    if(isset($_GET['field']))
    if($_GET['field']!=null)
    {
            $q = $_GET['field'];
        //include("db.php");
            $ip = $_SERVER['REMOTE_ADDR'];
            $user = $_SESSION['luser'];
            $index = "srilanka";
            $type = "searches";       
        
        $params = [
    'index' => $index,
    'type' => $type,
    'body' => [
        'query' => [
            'bool' => [
                'should' => [ 
                    'match' => ['_all' => $q],
                    //'match' => ['keywords' => $q]
                ]
            ]
        ]
    ]
];
        
        $response = $client->search($params);
        
        
        if($response['hits']['total']>0)
        {
         $results_count = $response['hits']['total'];
         $results = $response['hits']['hits'];
         $took = $response['took'];
         $took = $took/1000;
         
         echo "<div class='center'>";   
         if($results_count<10){
         echo "<a style='color: #545454'>First ".$results_count." of ".$results_count." results (".$took." seconds)</a>";
         }
         else{
         echo "<a style='color: #545454'>First 10 of ".$results_count." results (".$took." seconds)</a>";    
         }
         echo "<br>";
         echo "<br>";
         //die;
         $max_score = $response['hits']['max_score'];
         //echo "<div class='center'>";
         foreach($results as $r)
         {
                        //if($max_score==$r['_score'])
                        //{
                        //echo '<pre>', print_r($r['_id']), '</pre>';
                        echo "<a id='res' href='/google/index.php' style='text-decoration: none'>".ucfirst($r['_source']['searched'])."</a>";
                        echo "<br>";
                        echo "<a style='color: #006621'>".ucfirst($r['_source']['user'])."</a>";
                        echo "<br>";   
                        echo "<a style='color: #545454'>".$r['_source']['ip']."</a>";
                        echo "<br>"; 
                        echo "<br>";
                        //}
         }
         echo "</div>";
        }
        else {
                echo "<div class='center'>";
                echo "Sorry No Results found  :(";
                echo "</div>";
            }
        
        
        /*
        $search_sql = "select * from users where username like '%".$_GET['field']."%' ";
        $search_sql_query = mysqli_query($conn,$search_sql);
        if(mysqli_num_rows($search_sql_query)!=0){
            echo "<div class='center'>";
            $rs=mysqli_fetch_assoc($search_sql_query);
            do { ?>
            <p><?php    
                        echo "<a id='res' href='/google/index.php' style='text-decoration: none'>".ucfirst($rs['username'])."</a>";
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