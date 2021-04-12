<?php
//This file is for editing a user from the database

//Using a session to protect the rights of messign around with the page
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true
    && $_SESSION["isAdmin"] == 1){

include 'C:\xampp\htdocs\CarsProject\businesslayer\Usershandler.php';

// Include config file
include_once 'C:\xampp\htdocs\CarsProject\datalayer\Db_connection.php';

//For now this only will allow editing user information, and not password until I find a solution

$email      = "";
$isAdmin    = "";

$email_err     = "";
$isAdmin_err   = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
  global $conn;

  if(empty(trim($_POST["email"]))){
    $email_err = "Please enter your email.";
  }

  if(empty(trim($_POST["isAdmin"]))){
    $isAdmin_err = "Please enter the role desired for the user. (Has to be either 0 or 1)";
  } else{
    $isAdmin = trim($_POST['isAdmin']);
  }



  //If every form is filled we go down here
  if(empty($email_err)
      && empty($isAdmin_err))
  {
    // Check input errors before inserting in database
    $email = trim($_POST['email']);
    //Trying to check if a serialnumber for the car is already existing
    if (!checkForExisitingEmailHandler($email)){
      $email_err = "This email is not in our database.";
      //die;
    } else{
      $email = trim($_POST["email"]);
      //die;

      //If everyhing is correct we register the car
      setAdminRightsHandler($email, $isAdmin);
      //redirecting after registering a car
      header("location: \CarsProject\Index.php");
      //die;
    }
  }
    // Close connection
    mysqli_close($conn);
}
?>

<?php $currentPage = 'edituser'; ?>
<?php include('C:\xampp\htdocs\CarsProject\viewlayer\visual\NavBar2.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update car</title>
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
        <h2>Update userrole</h2>
        <p>Please fill this form to update the user's role.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($isAdmin_err)) ? 'has-error' : ''; ?>">
                <label>Admin status</label>
                <input type="text" name="isAdmin" class="form-control" value="<?php echo $isAdmin; ?>">
                <span class="help-block"><?php echo $isAdmin_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
        </form>
    </div>
</body>
</html>
<?php } ?>

<?php
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    //header("location: Login.php");
    include('C:\xampp\htdocs\CarsProject\viewlayer\unauthorizedaccess\DenyAccess.php');
    //exit;
}
?>
