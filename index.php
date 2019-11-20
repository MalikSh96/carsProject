<?php
  //include 'Datalayer\db_connection.php';
  include('Businesslayer\carshandler.php');
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
  <div id="getAllUsers">
    <h3>GET ALL USERS</h3>
    <?php
      //getAllUsers();
    ?>
  </div>

  <div id="getUserByEmail">
    <h3>GET USER BY EMAIL</h3>
    <?php
      $email = "malik96sharfo@hotmail.com";
      //getUserByEmail($email);
    ?>
  </div>

  <div id="createUser">
    <h3>CREATE USER</h3>
    <?php
      $email = "malik96sharfo@hotmail.com";
      //echo $email . "<br>";
      $firstname = "Malik";
      //echo $firstname . "<br>";
      $lastname = "Sharfo";
      //echo $lastname . "<br>";
      $password = "AdminPassword";
      $lastlogin = date("Y/m/d h:i:s");
      $isAdmin = true;
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
      $oldPassword = "testpwd";
      $newPassword = "password";
      $lastlogin = date("Y/m/d h:i:s");
      //editPassword($email, $oldPassword, $newPassword, $lastlogin);
    ?>
  </div>

  <!--------------------------------------------------------------------------->
  <!---BELOW IS THE CAR PART--->

  <div id="read">
    <h3>READ ALL CARS</h3>
    <?php
      //getAll();
    ?>
  </div>

  <div id="create">
    <h3>CREATING A CAR</h3>
    <?php
      //Hardcode inserting before going to insert through forms
      $design = "Mercedes Benz";
      //echo $design . "<br>";
      $design_model = "E-Class";
      //echo $design_model . "<br>";
      $fuel = "Benzin";
      //echo $fuel . "<br>";
      $model_year = 2019;
      //echo $model_year . "<br>";
      $kilometers = 40000;
      //echo $kilometers . "<br>";
      $color = "Navy blue";
      //echo $color . "<br>";
      $steering_type = "Servo steering";
      //echo $steering_type . "<br>";
      $gear_type = "Manual";
      //echo $gear_type . "<br>";
      $serialnumber = "MercedesBenz";
      //echo $serialnumber . "<br>";
      $updated = date("Y/m/d h:i:s"); //<--returns current date/time OF the SERVER
      //echo $updated . "<br>";
      //createCarHandler($design, $design_model, $fuel, $model_year, $kilometers, $color, $steering_type, $gear_type, $serialnumber, $updated);
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
     $design = "Mercedes Benz";
     //echo $design . "<br>";
     $design_model = "E300";
     //echo $design_model . "<br>";
     $fuel = "Benzin";
     //echo $fuel . "<br>";
     $model_year = 2019;
     //echo $model_year . "<br>";
     $kilometers = 10000;
     //echo $kilometers . "<br>";
     $color = "Sky blue";
     //echo $color . "<br>";
     $steering_type = "Servo steering";
     //echo $steering_type . "<br>";
     $gear_type = "Manual";
     //echo $gear_type . "<br>";
     $serialnumber = "MercedesBenz";
     //echo $serialnumber . "<br>";
     $updated = date("Y/m/d h:i:s"); //<--returns current date/time OF the SERVER
     //echo $updated . "<br>";
     //updateCarHandler($design, $design_model, $fuel, $model_year, $kilometers, $color, $steering_type, $gear_type, $serialnumber, $updated);
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
      $serialnumber = "SuzuSwift431";
      //echo $serialnumber . "<br>";
      deleteCarHandler($serialnumber);
     ?>
   </div>
</body>
</html>
