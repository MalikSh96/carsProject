<?php
  //include 'Datalayer\db_connection.php';
  include_once 'Datalayer\carmapper.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Cars test</title>
</head>
<body>
  <?php
  //below is just a test for the first include, that a connection is established
    // $sql = "select * from information;";
    // $result = mysqli_query($conn, $sql);
    // $resultCheck = mysqli_num_rows($result); //checks for data
    //
    // if($resultCheck > 0){
    //   while($row = mysqli_fetch_assoc($result)){
    //     //mysqli_fetch_assoc() gets all results
    //     //$row becomes and array due to ^
    //     echo $row['design'];
    //     echo "<br>";
    //     echo $row['design_model'];
    //   }
    // }
    $design = "Kia";
    echo $design . "<br>";
    $design_model = "Picanto";
    echo $design_model . "<br>";
    $fuel = "Benzin";
    echo $fuel . "<br>";
    $model_year = 2005;
    echo $model_year . "<br>";
    $kilometers = 300000;
    echo $kilometers . "<br>";
    $color = "Dark orange";
    echo $color . "<br>";
    $steering_type = "Servo steering";
    echo $steering_type . "<br>";
    $gear_type = "Manual";
    echo $gear_type . "<br>";
    $updated = date("Y/m/d h:i:s"); //<--returns current date/time OF the SERVER
    createCar($design, $design_model, $fuel, $model_year, $kilometers, $color, $steering_type, $gear_type, $updated);
   ?>
</body>
</html>
