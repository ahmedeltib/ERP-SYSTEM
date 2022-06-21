<?php
  		// 1. Create a database connection
//  $dbhost = "";
//  $dbuser = "";
//  $dbpass = "";
//  $dbname = "";
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $dbname = "erp_project";
  $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
 // Test if connection occurred.
  if(mysqli_connect_errno()) {
    die("Database connection failed: " . 
         mysqli_connect_error() . 
         " (" . mysqli_connect_errno() . ")"
    );
  }
mysqli_set_charset($connection, "utf8");
?>
