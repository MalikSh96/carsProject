<?php
//Link: https://stackoverflow.com/questions/2467945/how-to-generate-json-file-with-php

//include configuration file
include_once 'C:\xampp\htdocs\CarsProject\datalayer\Db_connection.php';

//Car handler
include('C:\xampp\htdocs\CarsProject\businesslayer\Carshandler.php');

//Arrays to sort out our data
$response = array();
$posts = array();

//Array that contains the data retrived from the database
$dataextracter[] = array();
$dataextracter = returnAllCarsHandler(); //<-- this retrives all cars in the database
$datacount = count($dataextracter);
if($datacount > 0)
{
  for ($i = 0; $i < $datacount; $i++)
  {
    $id                         = $dataextracter[$i]['id'];
    $design                     = $dataextracter[$i]['design'];
    $design_model               = $dataextracter[$i]['design_model'];
    $fuel                       = $dataextracter[$i]['fuel'];
    $model_year                 = $dataextracter[$i]['model_year'];
    $kilometers                 = $dataextracter[$i]['kilometers'];
    $color                      = $dataextracter[$i]['color'];
    $steering_type              = $dataextracter[$i]['steering_type'];
    $gear_type                  = $dataextracter[$i]['gear_type'];
    $serialnumber               = $dataextracter[$i]['serialnumber'];
    $vehicle_inspection_current = $dataextracter[$i]['vehicle_inspection_current'];
    $vehicle_inspection_next    = $dataextracter[$i]['vehicle_inspection_next'];
    $description                = $dataextracter[$i]['description'];
    $updated                    = $dataextracter[$i]['updated'];

    $posts[] = array('id'                        => $id,
                    'design'                     => $design,
                    'design_model'               => $design_model,
                    'fuel'                       => $fuel,
                    'model_year'                 => $model_year,
                    'kilometers'                 => $kilometers,
                    'color'                      => $color,
                    'steeringType'               => $steering_type,
                    'gear_type'                  => $gear_type,
                    'serialnumber'               => $serialnumber,
                    'vehicle_inspection_current' => $vehicle_inspection_current,
                    'vehicle_inspection_next'    => $vehicle_inspection_next,
                    'description'                => $description,
                    'updated'                    => $updated);
  }
}

$response['posts'] = $posts;

$fp = fopen('carsdata.json', 'w');
fwrite($fp, json_encode($response, JSON_PRETTY_PRINT));
fclose($fp);
?>

<!DOCTYPE>
<html>
<?php $currentPage = 'JsonGeneration'; ?>
<?php
  include('C:\xampp\htdocs\CarsProject\viewlayer\css-styling\stylingone.php');
  include('C:\xampp\htdocs\CarsProject\viewlayer\ReturnBack.php');
?>
<head>
  <title>JSON Feed Generator</title>
  <div>
    <h3>
      Your json feed has been generated/updated, please check your cardata.json file.
    </h3>
  </div>
</head>
</html>
