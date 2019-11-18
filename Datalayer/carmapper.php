<?php


  function createCar($design, $design_model, $fuel, $model_year, $kilometers, $color, $steering_type, $gear_type, $updated)
  {
    $query = "insert ignore into information (design, design_model, fuel, model_year,
              kilometers, color, steering_type, gear_type) values
              ($design, $design_model, $fuel, $model_year, $kilometers, $color, $steering_type, $gear_type, $updated)";
    mysqli_query($conn, $query);
  }
?>
