<?php
//Library
require 'Support\password_compat\lib\password.php';

include_once 'Db_connection.php';

//about hashing passwords
//https://stackoverflow.com/questions/11177557/why-is-password-hash-different-for-2-users-with-the-same-password
//link used
//https://github.com/ircmaxell/password_compat

function createUser($email, $firstname, $lastname, $password, $lastlogin, $isAdmin){
  global $conn; //using global before $conn to make this function awaare to access the connection
  if(!$conn)
  {
    echo "NOT CONNECTED";
  }
  else{
    echo "CONNECTED -- executing task <br>";
    //https://github.com/ircmaxell/password_compat
    //hash password before you query
    $hash = password_hash($password, PASSWORD_BCRYPT);
    //var_dump($hash);
    //die;
    //Below part used to see if passwords matches
    /*if(password_verify($password, $hash)){
      echo "MATCHING PASSWORD";
      echo $password . "<br>";
      echo $hash . "<br>";
	  } else {
	    echo "PASSWORDS NOT MATCHING";
	  }
    die;*/

    $query = "INSERT IGNORE INTO cars.users (email,
                  firstname,
                  lastname,
                  password,
                  lastlogin,
                  isAdmin)
              VALUES
                  ('$email',
                  '$firstname',
                  '$lastname',
                  '$hash',
                  '$lastlogin',
                  '$isAdmin')";
    //var_dump($query);
    //die;
    mysqli_query($conn, $query) or trigger_error(mysqli_error($conn) . " in " . $query);
  }
}

function editUserFirstAndLastname($email, $firstname, $lastname, $lastlogin){
  //this function is for non-admin users to edit themself
  global $conn; //using global before $conn to make this function awaare to access the connection
  if(!$conn)
  {
    echo "NOT CONNECTED";
  }
  else{
    echo "CONNECTED -- executing task <br>";

    $query = "UPDATE users SET firstname = '$firstname',
              lastname = '$lastname',  lastlogin = '$lastlogin'
              WHERE email = '$email'";
    //var_dump($query);
    //die;
    mysqli_query($conn, $query) or trigger_error(mysqli_error($conn) . " in " . $query);
  }
}

function editEmail($oldEmail, $newEmail, $lastlogin){
  global $conn; //using global before $conn to make this function awaare to access the connection
  if(!$conn)
  {
    echo "NOT CONNECTED";
  }
  else{
    echo "CONNECTED -- executing task <br>";

    $getOldMail = "SELECT email FROM cars.users WHERE email = '$oldEmail'";
    $result = mysqli_query($conn, $getOldMail) or trigger_error(mysqli_error($conn) . " in " . $getOldMail);
    $resultCheck = mysqli_fetch_assoc($result);
    //var_dump($resultCheck);
    //die;

    $query = "UPDATE users SET email = '$newEmail',
              lastlogin = '$lastlogin'
              WHERE email = '$oldEmail'";
    var_dump($query);
    //die;
    mysqli_query($conn, $query) or trigger_error(mysqli_error($conn) . " in " . $query);
  }
}

function editPassword($email, $oldPassword, $newPassword, $lastlogin){
  global $conn; //using global before $conn to make this function awaare to access the connection
  if(!$conn)
  {
    echo "NOT CONNECTED";
  }
  else{
    echo "CONNECTED -- executing task <br>";
    $getDatabasePass = "SELECT password FROM cars.users WHERE email = '$email'";
    $result = mysqli_query($conn, $getDatabasePass) or trigger_error(mysqli_error($conn) . " in " . $getDatabasePass);
    $resultCheck = mysqli_fetch_assoc($result); //is here returning the hashed password from the database
    $oldPass = $resultCheck['password']; //<-- hashed database pwd
    $hash = "";
    //if the users desires to edit his password we need to make sure his old and new matches
    if(password_verify($oldPassword, $oldPass)){
      //if passwords match we hash the new before we query
      $hash = password_hash($newPassword, PASSWORD_BCRYPT);
      echo "MATCHING PASSWORD";
	  } else {
	    echo "PASSWORD ARE NOT MATCHING, YOU CAN'T EDIT YOUR PASSWORD";
    }
    $query = "UPDATE users SET password = '$hash',
              lastlogin = '$lastlogin'
              WHERE email = '$email'";
    mysqli_query($conn, $query) or trigger_error(mysqli_error($conn) . " in " . $query);
  }
}

function getAllUsers(){
  global $conn; //using global before $conn to make this function awaare to access the connection
  if(!$conn)
  {
    echo "NOT CONNECTED";
  }
  else{
    $query = "SELECT * FROM cars.users";
    $result = mysqli_query($conn, $query);
    $resultCheck = mysqli_num_rows($result); //checks for data

    if($resultCheck > 0){
      while($row = mysqli_fetch_assoc($result)){
        //mysqli_fetch_assoc() gets all results
        //$row becomes and array due to ^
        echo "--------------------<br>";
        echo $row['email'];
        echo "<br>";
        echo $row['firstname'];
        echo "<br>";
        echo $row['lastname'];
        echo "<br>";
        echo $row['isAdmin'];
        echo "<br>";
        echo $row['lastlogin'];
        echo "<br>";
      }
    }
  }
}

function getUserByEmail($email){
  global $conn;
  if(!$conn){
    echo "NOT CONNECTED";
  }
  else{
    $query = "SELECT * FROM cars.users where email = '$email'";

    $result = mysqli_query($conn, $query) or trigger_error(mysqli_error($conn) . " in " . $query);

    $resultCheck = mysqli_num_rows($result); //checks for data

    if($resultCheck > 0){
      while($row = mysqli_fetch_assoc($result)){
        echo "<br>";
        echo "User found by email: <br>";
        echo $row['email'];
        echo "<br>";
        echo $row['firstname'];
        echo "<br>";
        echo $row['lastname'];
        echo "<br>";
        echo $row['isAdmin'];
        echo "<br>";
        echo $row['lastlogin'];
      }
    }
  }
}
?>
