<?php
   // start session
   session_start();



   // Include configure 
   require_once "configure.php";

   // Define variables and initialize with empty values
   $username = $password = "";
   $username_err = $password_err = $login_err = "";

    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){

      // Check if username is empty
      if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
      } else{
        $username = trim($_POST["username"]);
    }

    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
     }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username =?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // Redirect user to welcome page
                            header("location:http://localhost/phpmyadmin/index.php?route=/sql&server=1&db=aberdeen&table=admin&pos=0");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
       <meta charset="UTF-8">
       <title>Login</title>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
       <link rel="stylesheet" href="css/style.css">
       <nav>
        <style>
            body{ font: 14px sans-serif;
              display: flex;
              flex-direction: column;
              justify-content: center;
              padding:1.7rem ;
              margin:0;
              align-items: center;
              height: 100vh;
              font: size 18px;
              background: url(./image/aberdeen3.jpeg);
              background-size:cover;
            }
            .wrapper{
              width: 400px;
              max-width: 400px; 
              padding: 50px; 
              margin:1.7rem
              border-radius: var(--border-radius);
              background: #ffffff;
              font:500 1rem 
              padding: 2rem;
            }
        </style>
    </head>
    <body>
        <header>
            <div class="wrapper">
              <h2> Admin Login</h2>
              <p>Please fill in your credentials to login.</p>

              <?php
                if(!empty($login_err)){
               echo '<div class="alert alert-danger">' . $login_err . '</div>';
                }
              ?>

               <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                       <label>Username</label>
                       <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                       <span class="invalid-feedback"><?php echo $username_err; ?></span>
                       <class="form-control" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                        <span class="invalid-feedback"><?php echo $password_err; ?></span>
                        <class="form-control" autocomplete="off">
                    </div>

                    <div class="form-group">
                       <input type="submit" class="btn btn-success" value="Login">
                    </div>
                    <p><a href="logout.php">Logout</a>.</p>
               </form>
            </div>
        </header>
        <p style="text-align:center; font size:0.85em">Copyright &copy; 2020 Aberdeen Tourism</p>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
