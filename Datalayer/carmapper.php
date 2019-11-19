<?php
include_once 'db_connection.php';

  function createCar($design, $design_model, $fuel, $model_year, $kilometers, $color, $steering_type, $gear_type, $serialnumber, $updated){
    global $conn; //using global before $conn to make this function awaare to access the connection
    if(!$conn)
    {
      echo "NOT CONNECTED";
    }
    else{
      echo "CONNECTED -- executing task <br>";

      $query = "INSERT IGNORE INTO cars.information (design,
                    design_model,
                    fuel,
                    model_year,
                    kilometers,
                    color,
                    steering_type,
                    gear_type,
                    serialnumber,
                    updated)
                VALUES
                    ('$design',
                    '$design_model',
                    '$fuel',
                    '$model_year',
                    '$kilometers',
                    '$color',
                    '$steering_type',
                    '$gear_type',
                    '$serialnumber',
                    '$updated')";
      var_dump($query);
      //die;
      mysqli_query($conn, $query) or trigger_error(mysqli_error($conn) . " in " . $query);
    }
  }

  function updateCar($design, $design_model, $fuel, $model_year, $kilometers, $color, $steering_type, $gear_type, $serialnumber, $updated){
    global $conn; //using global before $conn to make this function awaare to access the connection
    if(!$conn)
    {
      echo "NOT CONNECTED";
    }
    else{
      echo "CONNECTED -- executing task <br>";
      $query = "UPDATE information SET design = '$design',
                    design_model = '$design_model',
                    fuel = '$fuel',
                    model_year = '$model_year',
                    kilometers = '$kilometers',
                    color = '$color',
                    steering_type = '$steering_type',
                    gear_type = '$gear_type',
                    serialnumber = '$serialnumber',
                    updated = '$updated'
                    WHERE serialnumber = '$serialnumber'";
      var_dump($query);
      //die;
      mysqli_query($conn, $query) or trigger_error(mysqli_error($conn) . " in " . $query);
    }
  }

  function deleteCar($serialnumber){
    global $conn; //using global before $conn to make this function awaare to access the connection
    if(!$conn)
    {
      echo "NOT CONNECTED";
    }
    else{
      echo "CONNECTED -- executing task <br>";
      $query = "DELETE FROM information WHERE serialnumber = '$serialnumber'";
      var_dump($query);
      mysqli_query($conn, $query) or trigger_error(mysqli_error($conn) . " in " . $query);
    }
  }

  function getAll(){
    global $conn; //using global before $conn to make this function awaare to access the connection
    if(!$conn)
    {
      echo "NOT CONNECTED";
    }
    else{
      $query = "SELECT * FROM information";
      $result = mysqli_query($conn, $query);
      $resultCheck = mysqli_num_rows($result); //checks for data

      if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
          //mysqli_fetch_assoc() gets all results
          //$row becomes and array due to ^
          echo "--------------------<br>";
          echo $row['design'];
          echo "<br>";
          echo $row['design_model'];
          echo "<br>";
          echo $row['fuel'];
          echo "<br>";
          echo $row['model_year'];
          echo "<br>";
          echo $row['kilometers'];
          echo "<br>";
          echo $row['color'];
          echo "<br>";
          echo $row['steering_type'];
          echo "<br>";
          echo $row['gear_type'];
          echo "<br>";
          echo $row['serialnumber'];
          echo "<br>";
        }
      }
    }
  }
?>
