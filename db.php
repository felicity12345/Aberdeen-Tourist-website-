<?php
    //* connecting to a localhost with the db name and password *//
        $link = mysqli_connect("localhost", "root", "", "aberdeen");

    
    // Check connection
       if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
        }

  
    //  creating table query execution
        $sql = "CREATE TABLE users (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        username VARCHAR(250) NOT NULL UNIQUE,
        password VARCHAR(250) NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP)";
        if(mysqli_query($link, $sql)){
        echo "  Tourist Table created successfully.";
     }    else{
       echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
      }
       
    // Close connection
        mysqli_close($link);
?>