<?php
  // Include configure 
  include("configure.php");

  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name= $_POST['name'];
    $email= $_POST['email'];
    $subject= $_POST['subject'];
    $message = $_POST['message'];
    
    

    //connection
    if(!empty($name) && !empty($email) && !empty($subject) && !empty($message)){
      $query = "insert into contact (name, email, subject, message) values ('$name', '$email', '$subject', '$message')";

      mysqli_query($link, $query);

      header("location: #");
      die('connection Error('.mysqli_connect_errno().')'.mysqli_connect_error());

    }else{
     
    }

  }

?>
   
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.php">ABZ</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
       <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Categories
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
             <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>

  </head>
  <body>
    <center><h3>SEND MAIL</h3></center>
    <section class="my-7">
      <div class="w-50 m-auto">   
        <form class="contact-form" action="contact.php" method="post">
          <input type="text" name="name" placeholder="Full name">
          <input type="text" name="email" placeholder="Email">
          <input type="text" name="subject" placeholder="Subject">
          <textarea name="message" placeholder="message"></textarea>
          <center><button type="submit" class="btn btn- success"><h3>submit</h3></button></center>
        </form>
      </div>
    </section>
   <p style="text-align:center; font size:0.85em">Copyright &copy; 2020 Aberdeen Tourism</p>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
