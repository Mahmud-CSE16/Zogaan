<?php 
  $connection= mysqli_connect("localhost","root","","zogaan");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  else{
  	echo "connected";
  }
 ?>