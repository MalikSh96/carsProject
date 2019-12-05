<?php
//Link for uploading a photo: https://www.youtube.com/watch?v=JaRq73y5MJk
//This file is for adding a car to the database

include 'C:\xampp\htdocs\CarsProject\businesslayer\carshandler.php';

// Include config file
include_once 'C:\xampp\htdocs\CarsProject\datalayer\Db_connection.php';

$design                     = "";
$design_model               = "";
$fuel                       = "";
$model_year;
$kilometers;
$color                      = "";
$steering_type              = "";
$gear_type                  = "";
$serialnumber               = "";

$vehicle_inspection_current = "";
$vehicle_inspection_next    = "";

$description                = "";

$photoOne                   = "";
$photoTwo                   = "";
$photoThree                 = "";
$photoFour                  = "";
$photoFive                  = "";


$design_err         = "";
$design_model_err   = "";
$fuel_err           = "";
$model_year_err     = "";
$kilometers_err     = "";
$color_err          = "";
$steering_type_err  = "";
$gear_type_err      = "";
$serialnumber_err   = "";
$description_err    = "";
$vehicle_inspection_current_err = "";

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

  if(empty(trim($_POST["description"]))){
    $description_err = "Please enter a saying description of the car.";
  } else{
    $description = trim($_POST["description"]);
  }

  if(empty(trim($_POST["vehicle_inspection_current"]))){
    $vehicle_inspection_current_err = "Please enter if the car has been inspected. USE either 1 or 0. \n1 is inspected. \n0 is not inspected";
  } else{
    $vehicle_inspection_current = trim($_POST["vehicle_inspection_current"]);
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
      && empty($serialnumber_err)
      && empty($description_err)
      && empty($vehicle_inspection_current_err))
  {
    // Check input errors before inserting in database
    $serialnumber = trim($_POST['serialnumber']);
    //Trying to check if a serialnumber for the car is already existing
    if (checkForExisitingCarHandler($serialnumber)){
      $serialnumber_err = "This car is already registered.";
      //die;
    } else{
      $serialnumber = trim($_POST["serialnumber"]);
      //die;
      $photoOne = trim($_POST['PhotoOne']);
      $photoTwo = trim($_POST['PhotoTwo']);
      $photoThree = trim($_POST['PhotoThree']);
      $photoFour = trim($_POST['PhotoFour']);
      $photoFive = trim($_POST['PhotoFive']);

      var_dump($photoOne);
      echo "<br>";
      //die;

      //If everyhing is correct we register the car
      createCarHandler($design, $design_model, $fuel,
                                $model_year, $kilometers, $color,
                                $steering_type, $gear_type, $serialnumber,
                                $vehicle_inspection_current, $vehicle_inspection_next,
                                $description, $updated,
                                $photoOne, $photoTwo, $photoThree, $photoFour, $photoFive);

      //Link: https://www.php.net/manual/en/function.mkdir.php
      //Link: https://stackoverflow.com/questions/18216930/how-to-create-folder-with-php-code/18217147
      //Creating a folder that should contain the image path for the specific car
      $dir = "C:/xampp/htdocs/CarsProject/images/$serialnumber"; //path to directory
      //$file_to_write = $photoOne; //the photo to be stored in the folder

      //$remote_img = $photoOne;
      //$img = imagecreatefromjpeg($remote_img);

      if(is_dir($dir) === false)
      {
        //Creates the directory
        mkdir($dir);
      }

      //https://stackoverflow.com/questions/15117303/saving-image-straight-to-directory-in-php
      $link = array();
      $link = [
        "photoOne" => $photoOne,
        "photoTwo" => $photoTwo,
        "photoThree" => $photoThree,
        "photoFour" => $photoFour,
        "photoFive" => $photoFive,
      ];
      var_dump($link);
      echo "<br>";
      //die;

      $destdir = $dir . "/";

      //Link used: https://www.daniweb.com/programming/web-development/threads/418205/copy-image-from-one-folder-to-another
      //The code part that copies our photos from one folder to another
      $img = $photoOne; //name of file to be copied
      //read the file
      $fp = fopen('C:/Users/malik/Desktop/BackgroundPics/'. $photoOne, 'r') or die("Could not contact $photoOne");
      $page_contents = "";
      while ($new_text = fread($fp, 100))
      {
        $page_contents .= $new_text;
      }
      chdir($destdir); //This moves you from the current directory user to the images directory in the new user's directory
      $newfile = $photoOne; //name of your new file
      var_dump($newfile);
      //die;
      //create new file and write what you read from old file into it
      $fd = fopen($newfile, 'w');
      fwrite($fd, $page_contents);
      fclose ($fd); //close the file

      //redirecting after registering a car
      header("location: \CarsProject\Index.php");
      //die;
    }
  }
    // Close connection
    mysqli_close($conn);
}
?>

<?php $currentPage = 'createcar'; ?>
<?php include('C:\xampp\htdocs\CarsProject\viewlayer\visual\NavBar2.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register car</title>
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
        <h2>Register car</h2>
        <p>Please fill this form to register a car.</p>
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
            <div class="form-group <?php echo (!empty($vehicle_inspection_current_err)) ? 'has-error' : ''; ?>">
                <label>Vehicle inspection status</label>
                <input type="text" name="vehicle_inspection_current" class="form-control" value="<?php echo $vehicle_inspection_current; ?>">
                <span class="help-block"><?php echo $vehicle_inspection_current_err; ?></span>
            </div>
            <div>
                <label>Next vehicle inspection status</label>
                <input type="text" name="vehicle_inspection_next" class="form-control" value="<?php echo $vehicle_inspection_next; ?>">
            </div>
            <div class="form-group <?php echo (!empty($description_err)) ? 'has-error' : ''; ?>">
                <label>Description</label>
                <input type="text" name="description" class="form-control" value="<?php echo $description; ?>">
                <span class="help-block"><?php echo $description_err; ?></span>
            </div>
            <div>
              <!--<form method="post" enctype="multipart/form-data">-->
                <label>Pictures</label>
                <input type="file" name="PhotoOne" class="form-control" value="<?php echo $photoOne; ?>">
                <input type="file" name="PhotoTwo" class="form-control" value="<?php echo $photoTwo; ?>">
                <input type="file" name="PhotoThree" class="form-control" value="<?php echo $photoThree; ?>">
                <input type="file" name="PhotoFour" class="form-control" value="<?php echo $photoFour; ?>">
                <input type="file" name="PhotoFive" class="form-control" value="<?php echo $photoFive; ?>">
              <!--</form>-->
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
        </form>
    </div>
</body>
</html>
