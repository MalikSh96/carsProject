<?php
//This file is for adding a car to the database

include 'C:\xampp\htdocs\CarsProject\businesslayer\carshandler.php';

// Include config file
include_once 'C:\xampp\htdocs\CarsProject\datalayer\Db_connection.php';

$design         = "";
$design_model   = "";
$fuel           = "";
$model_year;
$kilometers;
$color          = "";
$steering_type  = "";
$gear_type      = "";
$serialnumber   = "";

$serialnumber_err   = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
  global $conn;

  $design = trim($_POST["design"]);
  $design_model = trim($_POST["design_model"]);
  $fuel = trim($_POST['fuel']);
  $model_year = trim($_POST['model_year']);
  $kilometers = trim($_POST['kilometers']);
  $color = trim($_POST['color']);
  $steering_type = trim($_POST['steering_type']);
  $gear_type = trim($_POST['gear_type']);

  if(empty(trim($_POST["serialnumber"]))){
    $serialnumber_err = "Please enter the serialnumber of the car.";
  }

  //If every form is filled we go down here
  if(empty($serialnumber_err))
  {
    // Check input errors before inserting in database
    $serialnumber = trim($_POST['serialnumber']);
    //Trying to check if a serialnumber for the car is already existing
    if (!checkForExisitingCarHandler($serialnumber)){
      $serialnumber_err = "This car is not in our database.";
      //die;
    } else{
      $serialnumber = trim($_POST["serialnumber"]);
      //die;

      //If everyhing is correct we register the car
      updateCarHandler($design, $design_model, $fuel, $model_year,
                      $kilometers, $color, $steering_type, $gear_type, $serialnumber);
      //redirecting after registering a car
      header("location: \CarsProject\Index.php");
      //die;
    }
  }
    // Close connection
    mysqli_close($conn);
}
?>

<?php $currentPage = 'editcar'; ?>
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
        <h2>Update car</h2>
        <p>Please fill this form to update a car.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Design</label>
                <input type="text" name="design" class="form-control" value="<?php echo $design; ?>">
            </div>
            <div class="form-group">
                <label>Design model</label>
                <input type="text" name="design_model" class="form-control" value="<?php echo $design_model; ?>">
            </div>
            <div class="form-group">
                <label>Fuel</label>
                <input type="text" name="fuel" class="form-control" value="<?php echo $fuel; ?>">
            </div>
            <div class="form-group">
                <label>Model year</label>
                <input type="number" name="model_year" class="form-control" value="<?php echo $model_year; ?>">
            </div>
            <div class="form-group">
                <label>Kilometers driven</label>
                <input type="number" name="kilometers" class="form-control" value="<?php echo $kilometers; ?>">
            </div>
            <div class="form-group">
                <label>Color of car</label>
                <input type="text" name="color" class="form-control" value="<?php echo $color; ?>">
            </div>
            <div class="form-group">
                <label>Steering type</label>
                <input type="text" name="steering_type" class="form-control" value="<?php echo $steering_type; ?>">
            </div>
            <div class="form-group">
                <label>Gear type</label>
                <input type="text" name="gear_type" class="form-control" value="<?php echo $gear_type; ?>">
            </div>
            <div class="form-group">
                <label>Serialnumber</label>
                <input type="text" name="serialnumber" class="form-control" value="<?php echo $serialnumber; ?>">
                <span class="help-block"><?php echo $serialnumber_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
        </form>
    </div>
</body>
</html>
