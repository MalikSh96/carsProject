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

$design_err         = "";
$design_model_err   = "";
$fuel_err           = "";
$model_year_err     = "";
$kilometers_err     = "";
$color_err          = "";
$steering_type_err  = "";
$gear_type_err      = "";
$serialnumber_err   = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
  global $conn;

  if(empty(trim($_POST["design"]))){
    $design_err = "Please enter name of the car.";
  } else{
    $design = trim($_POST["design"]);
  }

  if(empty(trim($_POST["design_model"]))){
    $design_model_err = "Please enter the model.";
  } else{
    $design_model = trim($_POST["design_model"]);
  }

  if(empty(trim($_POST["fuel"]))){
    $fuel_err = "Please enter the type of fuel.";
  } else{
    $fuel = trim($_POST['fuel']);
  }

  if(empty(trim($_POST["model_year"]))){
    $model_year_err = "Please enter the year of the model.";
  } else{
    $model_year = trim($_POST['model_year']);
  }

  if(empty(trim($_POST["kilometers"]))){
    $kilometers_err = "Please enter the distance driven of the car.";
  } else{
    $kilometers = trim($_POST['kilometers']);
  }

  if(empty(trim($_POST["color"]))){
    $color_err = "Please enter the color of the car.";
  } else{
    $color = trim($_POST['color']);
  }

  if(empty(trim($_POST["steering_type"]))){
    $steering_type_err = "Please enter the type of steering.";
  } else{
    $steering_type = trim($_POST['steering_type']);
  }

  if(empty(trim($_POST["gear_type"]))){
    $gear_type_err = "Please enter the type of gear.";
  } else{
    $gear_type = trim($_POST['gear_type']);
  }

  if(empty(trim($_POST["serialnumber"]))){
    $serialnumber_err = "Please enter the serialnumber of the car.";
  }

  //If every form is filled we go down here
  if(empty($design_err)
      && empty($design_model_err)
      && empty($fuel_err)
      && empty($model_year_err)
      && empty($kilometers_err)
      && empty($color_err)
      && empty($steering_type_err)
      && empty($gear_type_err)
      && empty($serialnumber_err))
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
            <div class="form-group <?php echo (!empty($design_err)) ? 'has-error' : ''; ?>">
                <label>Design</label>
                <input type="text" name="design" class="form-control" value="<?php echo $design; ?>">
                <span class="help-block"><?php echo $design_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($design_model_err)) ? 'has-error' : ''; ?>">
                <label>Design model</label>
                <input type="text" name="design_model" class="form-control" value="<?php echo $design_model; ?>">
                <span class="help-block"><?php echo $design_model_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($fuel_err)) ? 'has-error' : ''; ?>">
                <label>Fuel</label>
                <input type="text" name="fuel" class="form-control" value="<?php echo $fuel; ?>">
                <span class="help-block"><?php echo $fuel_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($model_year_err)) ? 'has-error' : ''; ?>">
                <label>Model year</label>
                <input type="number" name="model_year" class="form-control" value="<?php echo $model_year; ?>">
                <span class="help-block"><?php echo $model_year_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($kilometers_err)) ? 'has-error' : ''; ?>">
                <label>Kilometers driven</label>
                <input type="number" name="kilometers" class="form-control" value="<?php echo $kilometers; ?>">
                <span class="help-block"><?php echo $kilometers_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($color_err)) ? 'has-error' : ''; ?>">
                <label>Color of car</label>
                <input type="text" name="color" class="form-control" value="<?php echo $color; ?>">
                <span class="help-block"><?php echo $color_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($steering_type_err)) ? 'has-error' : ''; ?>">
                <label>Steering type</label>
                <input type="text" name="steering_type" class="form-control" value="<?php echo $steering_type; ?>">
                <span class="help-block"><?php echo $steering_type_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($gear_type_err)) ? 'has-error' : ''; ?>">
                <label>Gear type</label>
                <input type="text" name="gear_type" class="form-control" value="<?php echo $gear_type; ?>">
                <span class="help-block"><?php echo $gear_type_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($serialnumber_err)) ? 'has-error' : ''; ?>">
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
