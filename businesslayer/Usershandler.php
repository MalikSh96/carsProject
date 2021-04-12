<?php
//include('datalayer\Usermapper.php');
//include_once 'datalayer\Db_connection.php';

include('C:\xampp\htdocs\CarsProject\datalayer\Usermapper.php');
include_once 'C:\xampp\htdocs\CarsProject\datalayer\Db_connection.php';

function createUserHandler($email, $firstname, $lastname, $password){
  global $conn;
  $email         = mysqli_real_escape_string($conn, $email);
  var_dump($email);
  $firstname     = mysqli_real_escape_string($conn, $firstname);
  var_dump($firstname);
  $lastname      = mysqli_real_escape_string($conn, $lastname);
  var_dump($lastname);
  $password      = mysqli_real_escape_string($conn, $password);
  var_dump($password);
  $lastlogin     = date("Y/m/d h:i:s");

  createUser($email, $firstname, $lastname, $password, $lastlogin);
}

function editUserHandler($email, $firstname, $lastname){
  global $conn;
  $email         = mysqli_real_escape_string($conn, $email);
  $firstname     = mysqli_real_escape_string($conn, $firstname);
  $lastname      = mysqli_real_escape_string($conn, $lastname);
  $lastlogin     = date("Y/m/d h:i:s");

  editUser($email, $firstname, $lastname, $lastlogin);
}

function editEmailHandler($oldEmail, $newEmail){
  global $conn;
  $oldEmail   = mysqli_real_escape_string($conn, $oldEmail);
  $newEmail   = mysqli_real_escape_string($conn, $newEmail);
  $lastlogin  = date("Y/m/d h:i:s");

  editEmail($oldEmail, $newEmail, $lastlogin);
}

function editPasswordHandler($email, $oldPassword, $newPassword){
  /*
    Firstly I don't think it is necessary to escape a password
    As the passwords gets hashed, which means and SQL injection is avoided.
    Correct me if wrong
  */
  global $conn;
  $email        = mysqli_real_escape_string($conn, $email);
  $oldPassword2 = $oldPassword;
  $newPassword2 = $newPassword;
  $lastlogin    = date("Y/m/d h:i:s");

  editPassword($email, $oldPassword2, $newPassword2, $lastlogin);
}

function getUserByEmailHandler($email){
  return getUserByEmail($email);
}

function userLoginHandler($email, $password){
  global $conn;
  $email      = mysqli_real_escape_string($conn, $email);
  $password   = $password;
  $lastlogin  = date("Y/m/d h:i:s");
  return userLogin($email, $password, $lastlogin);
}

function getUserStatusHandler($email, $password){
  global $conn;
  $email      = mysqli_real_escape_string($conn, $email);
  $password   = $password;
  $lastlogin  = date("Y/m/d h:i:s");
  return getUserStatus($email, $password, $lastlogin);
}

function checkForExisitingEmailHandler($email){
  return checkForExisitingEmail($email);
}

function deleteUserHandler($email){
  global $conn;
  $email = mysqli_real_escape_string($conn, $email);
  deleteUser($email);
}

function returnAllUsersHandler(){
  return returnAllUsers();
}

function setAdminRightsHandler($email, $isAdmin){
  global $conn;
  $email = mysqli_real_escape_string($conn, $email);
  $isAdmin = $isAdmin;
  $lastlogin  = date("Y/m/d h:i:s");
  setAdminRights($email, $isAdmin, $lastlogin);
}
?>
