<?php
//Links
//https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php

//include 'businesslayer\Usershandler.php';
include 'C:\xampp\htdocs\CarsProject\businesslayer\Usershandler.php';

// Include config file
include_once 'C:\xampp\htdocs\CarsProject\datalayer\Db_connection.php';

// Define variables and initialize with empty values
$email = "";
$firstname = "";
$lastname = "";
$password = "";

//Use the confirm password later once the entire registration is fixed
//$confirm_password = "";

$email_err = "";
$firstname_err = "";
$lastname_err = "";
$password_err = "";

//$confirm_password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
  global $conn;

  // Check if firstname is empty
  if(empty(trim($_POST["firstname"]))){
    $firstname_err = "Please enter a firstname.";
  } else{
    $firstname = trim($_POST["firstname"]);
  }

  // Check if lastname is empty
  if(empty(trim($_POST["lastname"]))){
    $lastname_err = "Please enter a lastname.";
  } else{
    $lastname = trim($_POST["lastname"]);
  }

  // Validate password
  //if the password is empty is our first check
  if(empty(trim($_POST["password"]))){
    $password_err = "Please enter a password.";
  }

  if(empty(trim($_POST['email']))){
    //If the user does not enter an email
    $email_err = "Please enter an email";
  }

  //Validate confirm password
  /*if(empty(trim($_POST["confirm_password"]))){
      $confirm_password_err = "Please confirm password.";
  }*/

  //If every form is filled we go down here
  if(empty($email_err) && empty($password_err) && empty($firstname_err)
        && empty($lastname_err) /*&& empty($confirm_password_err)*/){
    // Check input errors before inserting in database
    $email = trim($_POST["email"]);
    //Trying to check if an email is already existing
    if (checkForExisitingEmailHandler($email)){
      $email_err = "This email is already taken.";
      //die;
    } else{
      $email = trim($_POST["email"]);
      //die;
      if(strlen(trim($_POST["password"])) < 6){
        //password must be specific length
        $password_err = "Password must have atleast 6 characters.";
      } else{
        $password = trim($_POST["password"]);

        /*$confirm_password = trim($_POST["confirm_password"]);
          if(empty($password_err) && ($password != $confirm_password)){
          $confirm_password_err = "Password did not match.";
        }*/

        //If everyhing is correct we create the user
        createUserHandler($email, $firstname, $lastname, $password);
        //redirecting after registering a user
        header("location: Login.php");
        //die;
      }
    }
  }
    // Close connection
    mysqli_close($conn);
}
?>

<?php $currentPage = 'register'; ?>
<?php include('C:\xampp\htdocs\CarsProject\viewlayer\visual\NavBar2.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
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
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($firstname_err)) ? 'has-error' : ''; ?>">
                <label>Firstname</label>
                <input type="text" name="firstname" class="form-control" value="<?php echo $firstname; ?>">
                <span class="help-block"><?php echo $firstname_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($lastname_err)) ? 'has-error' : ''; ?>">
                <label>Lastname</label>
                <input type="text" name="lastname" class="form-control" value="<?php echo $lastname; ?>">
                <span class="help-block"><?php echo $lastname_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <!--
            <div class="form-group <?php //echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php //echo $confirm_password; ?>">
                <span class="help-block"><?php //echo $confirm_password_err; ?></span>
            </div>-->
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>
</body>
</html>
