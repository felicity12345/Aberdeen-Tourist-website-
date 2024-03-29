<?php
  // start session
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

<!DOCTYPE html>
<html lang="en">
  <head>
    <!--meta tag-->
    <meta charset="UTF-8">
    <title>Welcome</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    
    <!-- start of nav bar -->
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
            Categories
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="visit.php">Place to visit</a>
              <a class="dropdown-item" href="place.php">Place to stay</a>
              <a class="dropdown-item" href="book.php">Book to visit</a>
              <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </head>
  <!--end of nav bar -->

  <body>
    <!-- start of div section -->
    <header>
      <h1 class="text-center">Things to do in Aberdeen</h1>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis, ipsam non iste in quos obcaecati similique eaque unde officiis dicta aliquid. Nulla est, animi architecto asperiores perspiciatis officia dolore vero esse fuga deleniti soluta alias officiis culpa dolores expedita modi tempora voluptas minus, fugiat, sed quis excepturi! Veniam earum rerum quasi alias cupiditate cum fugit quas, voluptatem quod enim atque officia facilis debitis ad obcaecati aspernatur provident consequuntur quibusdam inventore et! Temporibus odio delectus quos quas vitae distinctio eligendi nobis quis! Corporis, reiciendis, dolores dolor nulla dolorum veritatis sed perferendis tenetur odio tempore cumque quae fugit velit necessitatibus impedit maxime.</p>

  
      <div class="container-fluid">
        <div class="row">
        <div class="col-lg-4 col-md-4 col-12">
        <img src="image/gym.webp" class="img-fluid pb-3">
        <center><h4>ABERDEEN GYM CENTER</h4><center>
      </div>

      <div class="col-lg-4 col-md-4 col-12">
        <img src="image/2.jpg" class="img-fluid pb-3">
        <center><h4>ABERDEEN BEACH LEISURE CENTER</h4></center>
      </div>


      <div class="col-lg-4 col-md-4 col-12">
        <img src="image/6.jpg" class="img-fluid pb-3">
        <center><h4>ABERDEEN AMUSEMENT PARK</h4></center>
      </div>

      </div>
      </div>
      </section>
      </a>
    </header>
    <!-- end of div section  -->
    </header>
    <!-- start of div section -->
    <header>

      <div class="container-fluid">
       <div class="row">
        <div class="col-lg-4 col-md-4 col-12">
        <img src="image/lochter.jpg" class="img-fluid pb-3">
        <center><h4>RIDE ON LOCHTER</h4></center>
      </div>

      <div class="col-lg-4 col-md-4 col-12">
        <img src="image/food.jpg" class="img-fluid pb-3">
        <center><h4>ITALIAN RESTOURANT ABERDEEN</h4></center>
      </div>

      <div class="col-lg-4 col-md-4 col-12">
          <img src="image/night2.jpg" class="img-fluid pb-3">
          <center><h4>ABERDEEN NIGHT CLUB</h4></center>
      </div>
      </div>
      </div>
      </section>
      </a>  
      <!-- end of div section  -->
    </header>
    <p style="text-align:center; font size:0.85em">Copyright &copy; 2020 Aberdeen Tourism</p>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
<?php
  include_once 'footer.php';
?>