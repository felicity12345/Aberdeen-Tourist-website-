
<?php
include("configure.php");
$sql="SELECT * FROM book;";
$result = mysqli_query($link, $sql);
$resultCheck = mysqli_num_rows($result);
?>

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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>fetch Data from database</title>
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
      
     <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
         
          <a class="dropdown-item" href="contact.php">Contact Us</a>
          <a class="dropdown-item" href="logout.php">Logout</a>
          
        </div>
      </li>
    </ul>
  </div>
</nav>

  
</head>
    <body>
        <table align="center" boarder="2px" style="width:100%; line-height:40px;">
            <tr>
                <th colspan="7"><h2>Booking Record</h2></th>
            </tr>
            <t>
                <th> bookID </th>
                <th> name </th>
                <th> email </th>
                <th> number </th>
                <th> address </th>
                <th> arrivals </th>
                <th> leaving </th>
           </t>

           <?php
           while ($rows =mysqli_fetch_assoc($result)){
           ?>
               <tr>
                   <td><?php echo $rows['bookID']; ?></td>
                   
                   <td><?php echo $rows['name']; ?></td>
                   <td><?php echo $rows['email']; ?></td>
                   <td><?php echo $rows['number']; ?></td>
                   <td><?php echo $rows['address']; ?></td>
                   <td><?php echo $rows['arrivals']; ?></td>
                   <td><?php echo $rows['leaving']; ?></td>
               </tr>
               <?php
           }
           ?>
        </table>
        <center><p><h3>Thank you for booking with us</h3></p></center>
        <p style="text-align:center; font size:0.85em">Copyright &copy; 2020 Aberdeen Tourism</p>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>