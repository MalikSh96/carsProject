<?php
//Link USED: https://www.carronmedia.com/create-an-rss-feed-with-php/

//Link NOT USED: https://daveismyname.blog/create-an-rss-feed-with-php

header("Content-Type: application/rss+xml; charset=ISO-8859-1");

//include configuration file
include_once 'C:\xampp\htdocs\CarsProject\datalayer\Db_connection.php';

//Car handler
include('C:\xampp\htdocs\CarsProject\businesslayer\Carshandler.php');

$rssfeed = '<?xml version="1.0" encoding="ISO-8859-1"?>';
$rssfeed .= '<rss version="2.0">';
$rssfeed .= '<channel>';
$rssfeed .= '<title>My RSS feed</title>';
$rssfeed .= '<link>http://localhost:8080/CarsProject</link>'; //<--redefine these later
$rssfeed .= '<description>This is an example RSS feed</description>';
$rssfeed .= '<language>en-us</language>';
$rssfeed .= '<copyright>Copyright (C) 2019 localhost:8080/CarsProject</copyright>'; //<--redefine this later too

$dataextracter[] = array();
$dataextracter = returnAllCarsHandler();
$datacount = count($dataextracter);
if($datacount > 0)
{
  for ($i = 0; $i < $datacount; $i++)
  {
    $rssfeed .= '<item>';
    $rssfeed .= '<title>' . $dataextracter[$i]['design'] . '</title>';
    $rssfeed .= '<description>' . "ID: " . $dataextracter[$i]['id'] . " --- "
                . "Design model: " . $dataextracter[$i]['design_model'] . " --- "
                . "Fuel type: " . $dataextracter[$i]['fuel'] . " --- "
                . "Model year: " . $dataextracter[$i]['model_year'] . " --- "
                . "Kilometers driven: " . $dataextracter[$i]['kilometers'] . " --- "
                . "Color: " . $dataextracter[$i]['color'] . " --- "
                . "Steering type: " . $dataextracter[$i]['steering_type'] . " --- "
                . "Gear type: " . $dataextracter[$i]['gear_type'] . " --- "
                . "Serialnumber: " . $dataextracter[$i]['serialnumber'] . " --- "
                . "Last updated: " . $dataextracter[$i]['updated']
                . '</description>';
    $rssfeed .= '</item>';
  }
}

//Below part should be outside the loop
$rssfeed .= '</channel>';
$rssfeed .= '</rss>';

//To save the rss: https://stackoverflow.com/questions/5592906/how-to-save-rss-feeds/5593020
if($rssfeed){
  $fh = fopen('rssfeed.xml', 'w+'); //create new file if not exists
  fwrite($fh, $rssfeed) or die("Failed to write contents to new rss file"); //write contents to new XML file
  fclose($fh) or die("failed to close stream resource"); //close resource stream
} else{
  die("Failed to read contents of feed");
}

//echo $rssfeed;
?>

<!DOCTYPE>
<html>
<?php $currentPage = 'RssFeedGeneration'; ?>
<?php
  include('C:\xampp\htdocs\CarsProject\viewlayer\css-styling\stylingone.php');
  include('C:\xampp\htdocs\CarsProject\viewlayer\ReturnBack.php');
?>
<head>
  <title>RSS Feed Generator</title>
  <div>
    <h3>
      Your rss feed has been generated/updated, please check your rssfeed.xml file.
    </h3>
  </div>
</head>
</html>
