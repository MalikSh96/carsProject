<?php
  $dbServername = "localhost";
  $dbUsername = "root";
  $dbPassword = "";
  $dbName = "cars";

  $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
  

    // $link = mysqli_connect('localhost', 'root', 'fcbarcelona4ever', 'cars');
    // if (!$link) {
    //     echo "Not connected, error: " . $link->connect_error;
    //     //echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    //     //echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    //     exit;
    // }
    // else{
    //     echo "Connected " . mysqli_get_host_info($link);
    // }
    //
    // mysqli_close($link);
?>
