<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: contact.php");
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
    $fullname = $_POST['name'];
    $email = $_POST['email'];
    $subject= $_POST['contact'];
    $message = $_POST['location'];
    

    //connection

    if(!empty($name) && !empty($email) && !empty($contact) && !empty($location))
    {
      $query = "insert into contact (name, email, contact, location) values ('$name', '$email', '$contact', '$location')";

      mysqli_query($link, $query);

      header("location: #");
      die('connection Error('.mysqli_connect_errno().')'.mysqli_connect_error());

    }else
    {
     
    }

  }

?>
   
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact me</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <style>
body{ font: 14px sans-serif;
            
            flex-direction: column;
            justify-content: center;
            padding:1.7rem ;
            margin:0;
            align-items: center;
            height: 100vh;
            font: size 10px;
           
            background-size:cover;
         }
        .contact-form{
             width: 100%;
             max-width: 400px; 
            padding: 5px; 
            margin:1.7rem
            border-radius: var(--border-radius);
            background: #ffffff;
            font:500 1rem 
            padding: 2rem;
        }
</style>
 <section class="my-4">
          <div class="w-50 m-auto">   
    <form class="contact-form" action="contactform.php" method="post">
           <input type="text" name="name" placeholder="Full name">
           <input type="text" name="mail" placeholder="Your e-mail">
           <input type="text" name="subject" placeholder="Subject">
           <textarea name="message" placeholder="message"></textarea>
        <center><button type="submit" class="btn btn- success"><h3>submit</h3></button></center>
         
        </div>
    </form>
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