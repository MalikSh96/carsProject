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
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true
    && $_SESSION["isAdmin"] == 1)
{
    header("location: Welcome.php");
    exit;
}
elseif(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true
    && $_SESSION["isAdmin"] == 0)
{
    header("location: WelcomeUser.php");
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

    // Validate credentials
    if(empty($email_err) && empty($password_err)){

      //userLoginHandler is a function that calls another function, which returns a query result
      if(userLoginHandler($email, $password)){
        /*
          The logic for if one is a normal user or admin should be done here in
          this if statement.
        */
        $adminIdentifier[] = array();
        $adminIdentifier = getUserStatusHandler($email, $password);
        $isAdminConfirmer = $adminIdentifier[0]['isAdmin'];
        //echo "before var dump<br>";
        //var_dump($isAdminConfirmer);
        //echo "<br>";
        //die;
        if($isAdminConfirmer != 1){
          //echo "is not 1";
          //die;
          session_start();
          //Store data in session variables
          $_SESSION["loggedin"] = true;
          $_SESSION["id"] = $id;
          $_SESSION["email"] = $email;
          $_SESSION["isAdmin"] = $isAdminConfirmer;
          // Redirect non-admin user to index page
          header("location: WelcomeUser.php");
        }
        else{
          //echo "is 1";
          //die;
          session_start();
          //Store data in session variables
          $_SESSION["loggedin"] = true;
          $_SESSION["id"] = $id;
          $_SESSION["email"] = $email;
          $_SESSION["isAdmin"] = $isAdminConfirmer;
          // Redirect admin user to welcome page
          header("location: Welcome.php");
        }
      } else{
        $_SESSION["loggedin"] = false;
        try {
          $errorTxt = '<span style="color: red;">FAILED TO SIGN IN!<br>CHECK THAT YOUR EMAIL/PASSWORD IS CORRECT.</span>';
          echo $errorTxt;
        } catch (Exception $e) {
          echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
      }
    }
    // Close connection
    mysqli_close($conn);
}
?>

<?php $currentPage = 'login'; ?>
<?php include('C:\xampp\htdocs\CarsProject\viewlayer\visual\NavBar2.php'); ?>

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
<?php
  include('C:\xampp\htdocs\CarsProject\viewlayer\ReturnBack.php');
?>
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
