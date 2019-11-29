<?php
//Links used:
//https://www.youtube.com/watch?v=F40a7nsPhuQ
//https://www.youtube.com/watch?v=tlUgRpTslCI&list=PLI5t0u6ye3FG7had6A0jdRu8GXcmb8p_X

//include configuration file
include_once 'C:\xampp\htdocs\CarsProject\datalayer\Db_connection.php';

//Car handler
include('C:\xampp\htdocs\CarsProject\businesslayer\Carshandler.php');

//Creating the xml document
$doc = new DOMDocument('1.0');
//structures the xml data
$doc->formatOutput = true;
//We create an element usinf createElement()
$information = $doc->createElement('information');
//We append the child element to the parent element using appendChild()
$doc->appendChild($information);

//echo "<xmp>" . $doc->saveXML() . "</xmp>";

$dataextracter[] = array();
$dataextracter = returnAllCarsHandler(); //<-- this retrives all cars in the database
$datacount = count($dataextracter);
if($datacount > 0)
{
  for ($i = 0; $i < $datacount; $i++)
  {
    $car = $doc->createElement('car');
    //parent -> append child
    $information->appendChild($car);

    //appending the data
    $id = $doc->createElement('id', $dataextracter[$i]['id']);
    $car->appendChild($id);
    $design = $doc->createElement('design', $dataextracter[$i]['design']);
    $car->appendChild($design);
    $design_model = $doc->createElement('designModel', $dataextracter[$i]['design_model']);
    $car->appendChild($design_model);
    $fuel = $doc->createElement('fuel', $dataextracter[$i]['fuel']);
    $car->appendChild($fuel);
    $model_year = $doc->createElement('modelYear', $dataextracter[$i]['model_year']);
    $car->appendChild($model_year);
    $kilometers = $doc->createElement('kilometers', $dataextracter[$i]['kilometers']);
    $car->appendChild($kilometers);
    $color = $doc->createElement('color', $dataextracter[$i]['color']);
    $car->appendChild($color);
    $steering_type = $doc->createElement('steeringType', $dataextracter[$i]['steering_type']);
    $car->appendChild($steering_type);
    $gear_type = $doc->createElement('gearType', $dataextracter[$i]['gear_type']);
    $car->appendChild($gear_type);
    $serialnumber = $doc->createElement('serialnumber', $dataextracter[$i]['serialnumber']);
    $car->appendChild($serialnumber);
    $updated = $doc->createElement('updated', $dataextracter[$i]['updated']);
    $car->appendChild($updated);
  }
}

//saving to a directory
$doc->save('cardata.xml') or die('Unable to create XML file.');
?>

<!DOCTYPE>
<html>
<?php $currentPage = 'XmlFeedGeneration'; ?>
<?php
  include('C:\xampp\htdocs\CarsProject\viewlayer\css-styling\stylingone.php');
  include('C:\xampp\htdocs\CarsProject\viewlayer\ReturnBack.php');
?>
<head>
  <title>XML Feed Generator</title>
  <div>
    <h3>
      Your xml feed has been generated/updated, please check your cardata.xml file.
    </h3>
  </div>
</head>
</html>
