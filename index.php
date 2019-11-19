<?php
  //include 'Datalayer\db_connection.php';
  include('Datalayer\carmapper.php');
  include('Datalayer\usermapper.php');
  /*
  OBS!!!
  THESE CODINGS BELOW IS JUST FOR TEST PURPOSES
  WHEN TIME IS RIGHT MOVE THEM AWAY FROM VIEW AND
  USE THIS TYPE OF CODE IN THE BUSINESSLAYER
  IN THAT WAY YOU PRESERVE THE 3 LAYER DESIGN AND PROTECT
  YOUR CODE MORE AND ALSO REMEMBER TO AVOID MYSQL INJECTIONS
  */
?>

<!DOCTYPE html>
<html>
<head>
  <title>Cars test</title>
</head>
<body>
  <div id="createUser">
    <h3>CREATE USER</h3>
    <?php
      $email = "test@live.com";
      //echo $email . "<br>";
      $firstname = "Test1";
      //echo $firstname . "<br>";
      $lastname = "Test2";
      //echo $lastname . "<br>";
      $password = "Test123";
      $lastlogin = date("Y/m/d h:i:s");
      $isAdmin = false;
      //die;
      //createUser($email, $firstname, $lastname, $password, $lastlogin, $isAdmin);
    ?>
  </div>

  <div id="editUserFirstLast">
    <h3>EDIT USER</h3>
    <?php
      $email = "cool_boy_kuki@hotmail.com";
      //echo $email . "<br>";
      $firstname = "Testfirst";
      //echo $firstname . "<br>";
      $lastname = "Testlast";
      //echo $lastname . "<br>";
      $password = "12hellodummy34";
      $lastlogin = date("Y/m/d h:i:s");
      //editUserFirstAndLastname($email, $firstname, $lastname, $lastlogin);
    ?>
  </div>

  <div id="editEmail">
    <h3>EDIT EMAIL</h3>
    <?php
      $oldEmail = "dummy@hotmail.com";
      //echo $oldEmail . "<br>";
      $newEmail = "cool_boy_kuki@hotmail.com";
      //echo $newEmail . "<br>";
      $lastlogin = date("Y/m/d h:i:s");
      //editEmail($oldEmail, $newEmail, $lastlogin);
    ?>
  </div>

  <div id="editPass">
    <h3>EDIT PASSWORD</h3>
    <?php
      $email = "test@live.com";
      $oldPassword = "123456789password";
      $newPassword = "testpwd";
      $lastlogin = date("Y/m/d h:i:s");
      editPassword($email, $oldPassword, $newPassword, $lastlogin);
    ?>
  </div>

  <!--------------------------------------------------------------------------->
  <!---BELOW IS THE CAR PART--->

  <div id="read">
    <h3>READ ALL CARS</h3>
    <?php
      //getAll();
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
    ?>
  </div>

  <div id="create">
    <h3>CREATING A CAR</h3>
    <?php
      //Hardcode inserting before going to insert through forms
      $design = "Suzuki";
      //echo $design . "<br>";
      $design_model = "Swift";
      //echo $design_model . "<br>";
      $fuel = "Benzin";
      //echo $fuel . "<br>";
      $model_year = 2010;
      //echo $model_year . "<br>";
      $kilometers = 345000;
      //echo $kilometers . "<br>";
      $color = "Silver";
      //echo $color . "<br>";
      $steering_type = "Servo steering";
      //echo $steering_type . "<br>";
      $gear_type = "Manual";
      //echo $gear_type . "<br>";
      $serialnumber = "SuzuSwift431";
      //echo $serialnumber . "<br>";
      $updated = date("Y/m/d h:i:s"); //<--returns current date/time OF the SERVER
      //echo $updated . "<br>";
      //createCar($design, $design_model, $fuel, $model_year, $kilometers, $color, $steering_type, $gear_type, $serialnumber, $updated);
     ?>
   </div>

   <div id="update">
     <h3>UPDATING A CAR</h3>
     <?php
     //Hardcoded to update a car
     /*Needs to be refactoroed later
      So that first you FIND the car you want to UPDATE
      i.e you use the SERIALNUMBER of the car to first READ the data (SELECT)
      and THEN you do the UPDATE on the SELECTED car
     */
     //$id = 1;
     //echo $id . "<br>";
     $design = "Audi";
     //echo $design . "<br>";
     $design_model = "A4 Sedan";
     //echo $design_model . "<br>";
     $fuel = "Benzin";
     //echo $fuel . "<br>";
     $model_year = 2004;
     //echo $model_year . "<br>";
     $kilometers = 550000;
     //echo $kilometers . "<br>";
     $color = "White";
     //echo $color . "<br>";
     $steering_type = "Servo steering";
     //echo $steering_type . "<br>";
     $gear_type = "Manual";
     //echo $gear_type . "<br>";
     $serialnumber = "12345Audi";
     //echo $serialnumber . "<br>";
     $updated = date("Y/m/d h:i:s"); //<--returns current date/time OF the SERVER
     //echo $updated . "<br>";
     //updateCar($design, $design_model, $fuel, $model_year, $kilometers, $color, $steering_type, $gear_type, $serialnumber, $updated);
     ?>
   </div>

   <div id="delete">
     <h3>DELETING A CAR</h3>
     <?php
      //Hardcoded version
      /*
        Edit this later, so that it deletes a car based on its
        SERIALNUMBER because the SERIALNUMBER is the actual UNIQUE id of
        a car
      */
      //$id = 4;
      //echo $id . "<br>";
      $serialnumber = "Audi12345";
      //echo $serialnumber . "<br>";
      //deleteCar($serialnumber);
     ?>
   </div>
</body>
</html>
