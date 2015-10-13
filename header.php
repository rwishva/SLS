<!-- <div class='container-fluid' id='1'>
<div class='row-fluid' style='background-color: #ffffff'>
<div class='centering text-center' style='background-color: #ffffff'>
<h1>SLS</h1>
</div>
</div> -->
<?php
// session_start();
if (isset($_SESSION['luser'])) {
  # code...
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
        <a class="navbar-brand nav-middle" href="/SLS/">SLS - We provide Links</a>
      </div>
      <?php 
        if (isset($_SESSION['luser'])){
          include 'logged-in-header.php';
          }
          else{
           include 'not-logged-header.php'; 
          }
      ?>    
    </div>
  </div>
</nav>