
<?php


    // Include configure file
    require_once "configure.php";

    //  Define variables and initialize with empty values
    $new_password = $confirm_password = "";
    $new_password_err = $confirm_password_err = "";

    //   Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){

       //    Validate new password
       if(empty(trim($_POST["new_password"]))){
            $new_password_err = "Please enter the new password.";
          }   elseif(strlen(trim($_POST["new_password"])) < 8){
            $new_password_err = "Password must have atleast 8 characters.";
          }   else{
            $new_password = trim($_POST["new_password"]);
        }

        //     confirm password Validation
       if(empty(trim($_POST["confirm_password"]))){
          $confirm_password_err = "Please confirm the password.";
        } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET password = ? WHERE id = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);

            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: login.php");
                exit();
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
        <!-- meta tag -->
        <meta charset="UTF-8">
        <title>Reset Password</title>
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
       </nav>
   </head>
   
   <body>
        <!-- div class start -->
        <div class="wrapper">
            <h2>Reset Password</h2>
            <p>Please fill out this form to reset your password.</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label>New Password</label>
                    <input type="password" name="new_password" class="form-control <?php echo (!empty($new_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $new_password; ?>">
                    <span class="invalid-feedback"><?php echo $new_password_err; ?></span>
                    <class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>">
                        <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                        <class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Submit">
                        <a class="btn btn-link ml-2" href="welcome.php">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
        <!-- div class close -->
        <p style="text-align:center; font size:0.85em">Copyright &copy; 2020 Aberdeen Tourism</p>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
