<?php
//To delete a car from the collection
include 'C:\xampp\htdocs\CarsProject\businesslayer\carshandler.php';

// Include config file
include_once 'C:\xampp\htdocs\CarsProject\datalayer\Db_connection.php';

//Using a session to protect the rights of messign around with the page
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true
    && $_SESSION["isAdmin"] == 1){

$serialnumber     = "";
$serialnumber_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
  global $conn;

  if(empty(trim($_POST["serialnumber"]))){
    $serialnumber_err = "Please enter the serialnumber of the car you want to remove.";
  }

  //If every form is filled we go down here
  if(empty($serialnumber_err))
  {
    // Check input errors before inserting in database
    $serialnumber = trim($_POST['serialnumber']);
    $check = checkForExisitingCarHandler($serialnumber);
    //die;
    //Trying to check if a serialnumber for the car is already existing
    if (empty($check)){
      $serialnumber_err = "This car is not in our database.";
      //die;
    } else{
      //var_dump("ELSE CHECK");
      $serialnumber = trim($_POST["serialnumber"]);
      //die;

      //If everyhing is correct we delete the car
      deleteCarHandler($serialnumber);
      //redirecting after registering a car
      header("location: \CarsProject\Index.php");
      //die;
    }
  }
    // Close connection
    mysqli_close($conn);
}
?>

<?php $currentPage = 'deletecar'; ?>
<?php include('C:\xampp\htdocs\CarsProject\viewlayer\visual\NavBar2.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DeleteCar</title>
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
        <h2>Remove this car from the collection</h2>
        <p>Please fill in the information required to remove this specific car.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($serialnumber_err)) ? 'has-error' : ''; ?>">
                <label>Serialnumber</label>
                <input type="text" name="serialnumber" class="form-control" value="<?php echo $serialnumber; ?>">
                <span class="help-block"><?php echo $serialnumber_err; ?></span>
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
