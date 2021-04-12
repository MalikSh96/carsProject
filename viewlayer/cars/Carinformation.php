<?php
//Using a session to protect the rights of messign around with the page
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true
    && $_SESSION["isAdmin"] == 1){
?>
<!DOCTYPE>
<?php
include('C:\xampp\htdocs\CarsProject\businesslayer\Carshandler.php');
?>
<html>
<?php $currentPage = 'Carinformation'; ?>
<?php
include('C:\xampp\htdocs\CarsProject\viewlayer\css-styling\stylingoneadmin.php');
?>
<head>
  <div>
    <p>
      Here is the car information.
    </p>
  </div>

  <!--<button onclick="goBack()">Go Back</button>-->
  <!--<script>
    function goBack() {
      //Link: https://www.w3schools.com/jsref/met_his_back.asp
      //Return function to the previous page
      window.history.back();
    }
  </script>-->

  <!--OR YOU CAN USE THE VERSION BELOW-->
  <?php
    //Link: https://css-tricks.com/snippets/javascript/go-back-button/
    $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
    echo "<a href='$url'>Back</a>";
    ?>

    <?php
      //We get all data here
      /*
        As we are working with a return of type array, we need to access
        the elements of the array
      */
      //initializing our variable that will contain the data
      $data[] = array();
      //we assign the array to our function which returns an array
      $data = getCarByIdHandler($_GET['id']);
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
          <th>Fuel</th>
          <th>Model year</th>
          <th>Kilometers</th>
          <th>Color</th>
          <th>Price</th>
          <th>Steering type</th>
          <th>Gear type</th>
          <th>Current vehicle inspection status</th>
          <th>Description</th>
          <!--<th>Photos</th>-->
          <!--<th>WILL GET FILLED WITH MORE LATER</th>-->
          <!--<th></th>
          <th></th>
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
          <?php echo $data[$i]['design']; ?>
        </td>
				<td>
          <?php echo $data[$i]['design_model']; ?>
				</td>
				<td>
          <?php echo $data[$i]['fuel']; ?>
				</td>
				<td>
          <?php echo $data[$i]['model_year']; ?>
        </td>
				<td>
          <?php echo $data[$i]['kilometers']; ?>
        </td>
				<td>
          <?php echo $data[$i]['color']; ?>
        </td>
        <td>
          <?php echo $data[$i]['price_dk']; ?>
        </td>
				<td>
          <?php echo $data[$i]['steering_type']; ?>
        </td>
				<td>
          <?php echo $data[$i]['gear_type']; ?>
				</td>
        <td>
          <?php echo $data[$i]['vehicle_inspection_current']; ?>
				</td>
        <td>
          <?php echo $data[$i]['description']; ?>
				</td>
        <!--<td>
          <!--Used this link to display image: https://stackoverflow.com/questions/23842268/how-to-display-image-from-database-using-php-->
          <!--<img src="/CarsProject/images/<?php //echo $data[$i]['serialnumber'] . "/"
                    //. $data[$i]['PhotoOne']; ?>" alt="" width="100" height="100" class="img-responsive"/>

          <img src="/CarsProject/images/<?php //echo $data[$i]['serialnumber'] . "/"
                    //. $data[$i]['PhotoTwo']; ?>" alt="" width="100" height="100" class="img-responsive"/>

          <img src="/CarsProject/images/<?php //echo $data[$i]['serialnumber'] . "/"
                    //. $data[$i]['PhotoThree']; ?>" alt="" width="100" height="100" class="img-responsive"/>

          <img src="/CarsProject/images/<?php //echo $data[$i]['serialnumber'] . "/"
                    //. $data[$i]['PhotoFour']; ?>" alt="" width="100" height="100" class="img-responsive"/>

          <img src="/CarsProject/images/<?php //echo $data[$i]['serialnumber'] . "/"
                    //. $data[$i]['PhotoFive']; ?>" alt="" width="100" height="100" class="img-responsive"/>
          <?php //echo $data[$i]['PhotoOne']; //<-- this just echoes out the name of photo ?>
        </td>-->
				<!--<td>
          <?php //Fill with more data ?>
				</td>-->
			</tr>

      <div name="photos">
        <img src="/CarsProject/images/<?php echo $data[$i]['serialnumber'] . "/"
                  . $data[$i]['PhotoOne']; ?>" alt="" width="400" height="400" class="img-responsive"/>
      </div>

      <?php
        }
      ?>
    </tbody>
  </table>
  <?php
  }
  ?>
</head>
</html>

<?php } ?>

<?php
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    //header("location: Login.php");
    include('C:\xampp\htdocs\CarsProject\viewlayer\unauthorizedaccess\DenyAccess.php');
    //exit;
}
?>
