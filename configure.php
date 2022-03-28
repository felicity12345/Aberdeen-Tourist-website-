<?php
  /* Database credentials. */
  define('DB_SERVER', 'localhost');
  define('DB_USERNAME', 'root');
  define('DB_PASSWORD', '');
  define('DB_NAME', 'aberdeen');

  /* connecting to MySQL database */
  $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

   // Check connection
  if($link === false){
    die("ERROR: no connection. " . $link->connect_error);
 }
?>