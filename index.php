<?php
  //include 'Datalayer\db_connection.php';
  include('businesslayer\Carshandler.php');
  include 'businesslayer\Usershandler.php';

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
<?php $title = 'Home'; ?>
<?php $metaTags = 'tag1 tag2'; ?>
<?php $currentPage = 'index'; ?>

<?php
include('C:\xampp\htdocs\CarsProject\viewlayer\css-styling\stylingone.php');
?>
<html>
<!--<div>
  <h3>Testing the login function</h3>
  <?php
    //getUserStatusHandler("malik96sharfo@hotmail.com", "malik2660");
  ?>
</div>-->
<head>
    <meta charset="UTF-8">
    <title>Index</title>
</head>
<head>
  <!--Link used: https://www.webslesson.info/2016/10/datatables-jquery-plugin-with-php-mysql-and-bootstrap.html-->
  <!--DATATABLES RELATED-->
  <!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
</head>
<script>
$(document).ready( function () {
    $('#datatable').DataTable({
      "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
      "paging": true, //<--is per default true, so you don't have to set it really
    });
} );
</script>

<!--<form action="\CarsProject\viewlayer\adminrelated\CreateCar.php">
  <button class="button button1">Register a car</button>
</form>-->
<body>
    <?php
      //We get all data here
      /*
        As we are working with a return of type array, we need to access
        the elements of the array
      */
      //initializing our variable that will contain the data
      $data[] = array();
      //we assign the array to our function which returns an array
      $data = returnAllCarsHandler();
      //After we get the size of the array, so that we can loop through it for filling the data
      $datacount = count($data);
      if($datacount > 0)
      {
    ?>
    <table id="datatable" class="table table-hover" align="center">
      <thead>
        <tr>
          <th style="width: 25%">Design</th>
          <th>Design model</th>
          <th>Model year</th>
          <th>Price in DK</th>
          <!--<th></th>
          <th></th>-->
        </tr>
      </thead>
    <tbody>
      <!--USE THIS TO FILL IN THE DATA-->
      <?php
				for ($i = 0; $i < $datacount; $i++)
				{
      ?>
      <tr>
				<td colspan="1">
          <!--
            USE THE HREF TO REDIRECT TO AN INFORMATION PAGE FOR THE CAR PRESSED ON
            BUT ONLY ONE PAGE, AND THAT PAGE SHPULD TAKE THE ID OF THE SPECIFIC CAR
            TO SHOW THE ENTIRE INFORMATION TABLE.
          -->
          <a href= "viewlayer\cars\CarinformationUser.php?id=<?php echo $data[$i]['id']; ?>">
            <?php echo $data[$i]['design']; ?>
          </a>
        </td>
				<td>
          <?php echo $data[$i]['design_model']; ?>
				</td>
				<td>
          <?php echo $data[$i]['model_year']; ?>
        </td>
				<td>
          <?php echo $data[$i]['price_dk']; ?>
        </td>
        <!--<td>
          <!--Link I follow: https://www.w3docs.com/snippets/html/how-to-create-an-html-button-that-acts-like-a-link.html-->
          <!--<form action="\CarsProject\viewlayer\adminrelated\DeleteCar.php">
            <button class="button button2">Delete</button>
          </form>
        </td>
        <td>
          <form action="\CarsProject\viewlayer\adminrelated\EditCar.php">
            <button class="button button2">Edit</button>
          </form>
        </td>-->
			</tr>
      <?php
        }
      ?>
    </tbody>
  </table>
  <?php
  }
  ?>
  </div>
</body>
</html>
