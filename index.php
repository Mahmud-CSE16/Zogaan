<?php 
 $doc="";
  session_start();
  if(isset($_SESSION['user_name'])&&isset($_SESSION['user_username'])&&isset($_SESSION['user_email'])){
      $name=$_SESSION['user_name'];
      $username=$_SESSION['user_username'];
      $email=$_SESSION['user_email'];
      $doc.= '<h3 class="text-center mt-5">Name: '.$name.'</h3>';
      $doc.= '<h3 class="text-center">Username: '.$username.'</h3>';
      $doc.= '<h3 class="text-center">Email: '.$email.'</h3>';
  }
  else{

  }
 ?>

<!DOCTYPE html>
<html>
<head>
	  
    <?php include "includes/header.php"; ?>

    <title>Zogaan</title>
  <link rel="stylesheet" type="text/css" href="index.css">

</head>
<body class="start">
	<h1 class="back m-0 text-primary">Zogaan</h1>

    <!-- navbar -->
	<nav class="sticky-top navbar p-0 navbar-light bg-info navbar-expand-md">
        <div class="container">
          <a class="navbar-brand" href="#"><i class="fas fa-network-wired mr-2"></i>Zogaan</a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>
             <div class="collapse navbar-collapse" id="navbarNav">
                 <ul class="navbar-nav ml-auto">
                  <li class="nav-item ml-auto">
                  	  <a class="nav-link" href="login.php" class="text"><i class="fas fa-sign-in-alt mr-2"></i>log in</a>
                  </li>
                  <li class="nav-item ml-auto">
                      <a class="nav-link" href="logout.php" class="text"><i class="fas fa-sign-out-alt mr-2"></i>log Out</a>
                  </li>
                  <li class="nav-item ml-auto">
                  	<form class="search-box form-inline ml-auto">
	                <input class="search-txt" type="text" placeholder="Search">
	                <button class="btn btn-success search-btn"><i class="fas fa-search mt-1 p-1"></i></button>

	              </form>
                  </li>
                 </ul>
                  
              </div>
          </div>
    </nav>

    <?php
		// case-sensitive constant name
		define("GREETING", "Welcome to Zogaan");
		echo '<h1 class="text-center mt-5">'.GREETING.'</h1>';
    echo $doc;
	?>
    <?php include "includes/footer.php"; ?>
  
</body>
</html>