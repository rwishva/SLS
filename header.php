<?php
if (isset($_SESSION['luser'])) {
  $username = $_SESSION['luser'];
}
else
{
  $username = "Admin";
}

?>

<nav class="navbar SLS">
  <div class="container-fluid head-contain">
    <div class="row-fluid nav-middle">
      <div class="navbar-header nav-middle">
        <a class="navbar-brand nav-middle" href="/SLS/">SLS - We provide pure srilankan Links</a>
      </div>
      <?php
        include 'statscount.php'; 
        if (isset($_SESSION['luser'])){
          include 'logged-in-header.php';
          }
          else{
           include 'not-logged-header.php'; 
          }
      ?> 
      <?php include 'hovercards.php';?>   
    </div>
  </div>
</nav>