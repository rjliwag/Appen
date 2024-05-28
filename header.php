<?php include 'assets/libraries/custom-links.php';
require 'conn.php';

session_start();

if(isset($_SESSION['username'])){
    $admin_username = $_SESSION['username'];
}else{
    header("Location: login.php");
    exit();
}

?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark header">
  <div class="container-fluid">
    <a class="navbar-brand">Appen</a>
    <form class="d-flex" role="search" method="post" action="logout.php">
      <button class="btn btn-outline-success mt-3" type="submit">
      <?php
      if(session_status() == PHP_SESSION_ACTIVE) {
        echo "LOGOUT";
    }else{
      echo "LOGIN";
    } ?></button>
    </form>
  </div>
</nav>