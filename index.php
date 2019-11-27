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
          <th>Color</th>
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
          <a href= "viewlayer\cars\Carinformation.php?id=<?php echo $data[$i]['id']; ?>">
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
          <?php echo $data[$i]['color']; ?>
        </td>
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
