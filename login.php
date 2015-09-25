<?php
    // include("db.php");
    session_start();
?>

<html>
<head>
<link rel='stylesheet' type='text/css' href='/SLS/css/bstyle.css' />
            <link href='/SLS/css/bootstrap.min.css' rel='stylesheet'>
</head>
<body>
<?php include 'header.php';?>
<div id="title"><h1>Login Here</h1></div>
<div class="login1">
    <form name="form1" method="post">
        <table>
            <tr>
                <td>Username :</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password :</td>
                <td><input type="password" name="pwd"></td>
            </tr>
            <tr>
                <td style="text-align: right;"><input type="submit" id=addbtn value="SignIn" name="loginsub"></td>
            </tr>
        </table>
    </form>
    </div>
     <?php include 'footer.php';?>
    </body>
    
</html>

<?php
    if (isset($_POST['loginsub'])) {
        $v3 = $_POST['username'];
        $v4 = $_POST['pwd'];
        $get_user_sql = "SELECT * from users where username like '%$v3%' LIMIT 1";
        // $get_user_query = mysqli_query($conn,$get_user_sql);
        
        // if(mysqli_num_rows($get_user_query)!=0){
        // $rs = mysqli_fetch_assoc($get_user_query);
        $rs['username'] = "rangana";
        $rs['passwd'] = "123456";
        if ($rs['username']==$v3 && $rs['passwd']==$v4)
        {
            $_SESSION['luser'] = $v3;
            $_SESSION['ip'] = $rs['ip'];
            $_SESSION['start'] = time();
            $_SESSION['expire'] = $_SESSION['start'] + (1 * 60);
            $set_lastlogin_sql = "UPDATE users set lastlogin=now() where username like '%$v3%'";
            // $set_lastlogin_query = mysqli_query($set_lastlogin_sql);
            header('Location: /SLS/');
        } else {
            
                echo "<html>";
                echo "<head>";
                echo "<link rel='stylesheet' type='text/css' href='/SLS/css/style.css' />";
                echo "</head>";
                echo "</body>";
                echo "<div class='center' id='main'>";
                echo "Please enter the username or password again!";
                echo "</div>";
                echo "</body>";
                echo "</html>"; 
        }}
        else {
            echo "<html>";
            echo "<head>";
            echo "<link rel='stylesheet' type='text/css' href='/SLS/css/style.css' />";
            echo "</head>";
            echo "</body>";
            echo "<div class='center' id='main'>";
            echo "Please Contact Admin! or provide correct username";
            echo "</div>";
            echo "</body>";
            echo "</html>"; 
            
        }
    
?>