<?php
//To delete a car from the collection
include 'C:\xampp\htdocs\CarsProject\businesslayer\Usershandler.php';

// Include config file
include_once 'C:\xampp\htdocs\CarsProject\datalayer\Db_connection.php';

//Using a session to protect the rights of messign around with the page
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true
    && $_SESSION["isAdmin"] == 1){

$email     = "";
$email_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
  global $conn;

  if(empty(trim($_POST["email"]))){
    $serialnumber_err = "Please enter the email of the user you want to remove.";
  }

  //If every form is filled we go down here
  if(empty($email_err))
  {
    // Check input errors before inserting in database
    $email = trim($_POST['email']);
    $check = checkForExisitingEmailHandler($email);
    //die;
    //Trying to check if a serialnumber for the car is already existing
    if (empty($check)){
      $email_err = "This user is not in our database.";
      //die;
    } else{
      //var_dump("ELSE CHECK");
      $email = trim($_POST["email"]);
      //die;

      //If everyhing is correct we delete the car
      deleteUserHandler($email);
      //redirecting after registering a car
      header("location: \CarsProject/viewlayer\adminrelated\AllUsers.php");
      //die;
    }
  }
    // Close connection
    mysqli_close($conn);
}
?>

<?php $currentPage = 'deleteuser'; ?>
<?php include('C:\xampp\htdocs\CarsProject\viewlayer\visual\NavBarAdmin.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DeleteUser</title>
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
        <h2>Remove this user from the collection</h2>
        <p>Please fill in the information required to remove this specific user.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Remove">
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
