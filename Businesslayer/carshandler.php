<?php
/*//This file is used to preserve the 3-layer architecture and avoiding sql injections
include('datalayer\carmapper.php');
include_once 'datalayer\Db_connection.php';*/
include('C:\xampp\htdocs\CarsProject\datalayer\carmapper.php');
include_once 'C:\xampp\htdocs\CarsProject\datalayer\Db_connection.php';

//Links used
//https://www.php.net/manual/en/mysqli.real-escape-string.php
//https://websitebeaver.com/prepared-statements-in-php-mysqli-to-prevent-sql-injection

function createCarHandler($design, $design_model, $fuel, $model_year, $kilometers, $color, $steering_type, $gear_type, $serialnumber){
  global $conn;
  $design         = mysqli_real_escape_string($conn, $design);
  $design_model   = mysqli_real_escape_string($conn, $design_model);
  $fuel           = mysqli_real_escape_string($conn, $fuel);
  $model_year     = mysqli_real_escape_string($conn, $model_year);
  $kilometers     = mysqli_real_escape_string($conn, $kilometers);
  $color          = mysqli_real_escape_string($conn, $color);
  $steering_type  = mysqli_real_escape_string($conn, $steering_type);
  $gear_type      = mysqli_real_escape_string($conn, $gear_type);
  $serialnumber   = mysqli_real_escape_string($conn, $serialnumber);
  $updated        = date("Y/m/d h:i:s");

  createCar($design, $design_model, $fuel, $model_year, $kilometers, $color, $steering_type, $gear_type, $serialnumber, $updated);
}

function updateCarHandler($design, $design_model, $fuel, $model_year, $kilometers, $color, $steering_type, $gear_type, $serialnumber, $updated){
  global $conn;
  $design         = mysqli_real_escape_string($conn, $design);
  $design_model   = mysqli_real_escape_string($conn, $design_model);
  $fuel           = mysqli_real_escape_string($conn, $fuel);
  $model_year     = mysqli_real_escape_string($conn, $model_year);
  $kilometers     = mysqli_real_escape_string($conn, $kilometers);
  $color          = mysqli_real_escape_string($conn, $color);
  $steering_type  = mysqli_real_escape_string($conn, $steering_type);
  $gear_type      = mysqli_real_escape_string($conn, $gear_type);
  $serialnumber   = mysqli_real_escape_string($conn, $serialnumber);
  $updated        = date("Y/m/d h:i:s");

  updateCar($design, $design_model, $fuel, $model_year, $kilometers, $color, $steering_type, $gear_type, $serialnumber, $updated);
}

function deleteCarHandler($serialnumber){
  global $conn;
  $serialnumber = mysqli_real_escape_string($conn, $serialnumber);
  deleteCar($serialnumber);
}

function returnAllCarsHandler(){
  return returnAllCars();
}

function getCarByIdHandler($id){
  return getCarById($id);
}

function checkForExisitingCarHandler($serialnumber){
  return checkForExisitingCar($serialnumber);
}
?>
