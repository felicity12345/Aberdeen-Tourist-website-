<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
if(isset($_GET['logout'])){
    
  session_destroy();
  unset($_SESSION['username']);
  header("location : login.php");
}
?>


<?php
 include("configure.php");

  if($_SERVER['REQUEST_METHOD'] == "POST")

  {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $address = $_POST['location'];
    $arrivals = $_POST['arrivals'];
    $leaving = $_POST['leaving'];

    //connection

    if(!empty($name) && !empty($email) && !empty($number) && !empty($address) && !empty($arrivals) && !empty($leaving))
    {
      $query = "insert into book (name, email, number, address, arrivals, leaving) values ('$name', '$email', '$number', '$address', '$arrivals', '$leaving')";

      mysqli_query($link, $query);

      header("location: booking.php");
      die('connection Error('.mysqli_connect_errno().')'.mysqli_connect_error());

    }else
    {
     
    }

  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">ABZ</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="about.php">About Us <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown link
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          
          <a class="dropdown-item" href="login.php">Place to Visit</a>
          <a class="dropdown-item" href="signup.php">Things to do</a>
          <a class="dropdown-item" href="server.php">Place to stay</a>
           <a class="dropdown-item" href="apearlpassreset.php">Change Password</a>
           <a class="dropdown-item" href="apearllogout.php">Logout</a>
        </div>
      </li>
    </ul>
  </div>
  </nav>
  
</head>
<body>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam minima ab facilis, sequi aliquid dicta natus illum quasi harum nihil, laborum doloremque nisi. Ex dolor eligendi at qui necessitatibus accusantium, maiores omnis consequuntur atque. Sed, facilis. Illo expedita nesciunt, aliquid laudantium quia eius itaque beatae numquam repudiandae adipisci veniam tenetur eaque provident similique sint, impedit sapiente. Iure quasi distinctio rem consequuntur, quos voluptate nobis nostrum quod. Labore iure quidem reiciendis magni dolores amet suscipit quasi animi ipsa cumque, fugiat quia, ducimus quos. Ex qui et quidem tempora libero ut veniam cupiditate. Nulla sed vitae provident repellendus similique! Iusto, quos dicta!</p>
  <section class="my-4">
    <div class="py-4">
   <h1 class="text-center">Book your trip</h1>
 </div>
    <div class="w-50 m-auto">    
      <form method="post" class="book-form">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" placeholder="enter your name" name="name" class="form-control">
        </div>

        <div class="form-group">
          <label for="email">email</label>
          <input type="text" placeholder="enter your email" name="email" id="email" class="form-control">
        </div>

        <div class="form-group">
          <label for="number">number</label>
          <input type="number" placeholder="enter your number" name="number" class="form-control">
        </div>

        <div class="form-group">
          <label for="address">Address</label>
          <input type="text" placeholder="enter location" name="location" class="form-control">
        </div>

        <div class="form-group">
          <label for="arrivals">Arrivals</label>
          <input type="date"name="arrivals" class="form-control">
        </div>

        <div class="form-group">
          <label for="leaving">Leaving</label>
          <input type="date"name="leaving" class="form-control">
        </div>
   </div>
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
  
  <?php 
  include_once 'footer.php';
  ?> 