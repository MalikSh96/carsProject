<?php
//Links
//https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php

//include 'businesslayer\Usershandler.php';
include 'C:\xampp\htdocs\CarsProject\businesslayer\Usershandler.php';

// Include config file
include_once 'C:\xampp\htdocs\CarsProject\datalayer\Db_connection.php';

// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: Welcome.php");
    exit;
}


// Define variables and initialize with empty values
$email = "";
$password = "";
$email_err = "";
$password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
  global $conn;
    // Check if email is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter email.";
    } else{
        $email = trim($_POST["email"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

    //-----------------------REDO BELOW-----------------------------------------
    // Validate credentials
    if(empty($email_err) && empty($password_err)){

      //userLoginHandler is a function that calls another function, which returns a query result
      //userLoginHandler($email, $password);
      userLoginHandler($email, $password);

      //OBS!!!
      //BEFORE YOU START A SESSION MAKE SURE THAT YOU COMPARE PASSWORDS CORRECT
      //BECAUSE AS OF NOW YOU CAN SIGN IN WITH A RANDOM PASSWORD FOR AN EXISTING MAIL

      session_start();
      //Store data in session variables
      $_SESSION["loggedin"] = true;
      $_SESSION["id"] = $id;
      $_SESSION["email"] = $email;
      // Redirect user to welcome page
      header("location: Welcome.php");

        // // Prepare a select statement
        // $sql = "SELECT id, email, firstname, lastname, password FROM cars.users WHERE email = ?";
        //
        // if($stmt = mysqli_prepare($conn, $sql)){
        //     // Bind variables to the prepared statement as parameters
        //     mysqli_stmt_bind_param($stmt, "s", $param_email);
        //
        //     // Set parameters
        //     $param_email = $email;
        //
        //     // Attempt to execute the prepared statement
        //     if(mysqli_stmt_execute($stmt)){
        //         // Store result
        //         mysqli_stmt_store_result($stmt);
        //
        //         // Check if username exists, if yes then verify password
        //         if(mysqli_stmt_num_rows($stmt) == 1){
        //             // Bind result variables
        //             mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password);
        //             if(mysqli_stmt_fetch($stmt)){
        //                 if(password_verify($password, $hashed_password)){
        //                     // Password is correct, so start a new session
        //                     session_start();
        //
        //                     // Store data in session variables
        //                     $_SESSION["loggedin"] = true;
        //                     $_SESSION["id"] = $id;
        //                     $_SESSION["email"] = $email;
        //
        //                     // Redirect user to welcome page
        //                     header("location: Welcome.php");
        //   //-------------------HAVE TO DO MY WORK ABOVE-------------------------
        //   //--------------------------------------------------------------------
        //                 } else{
        //                     // Display an error message if password is not valid
        //                     $password_err = "The password you entered was not valid.";
        //                 }
        //             }
        //         } else{
        //             // Display an error message if username doesn't exist
        //             $email_err = "No account found with that email.";
        //         }
        //     } else{
        //         echo "Oops! Something went wrong. Please try again later.";
        //     }
        // }
        //
        // // Close statement
        // mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
    </div>
</body>
</html>
