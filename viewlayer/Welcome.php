<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: Login.php");
    exit;
}
?>

<?php
  //include 'Datalayer\db_connection.php';
  include('C:\xampp\htdocs\CarsProject\businesslayer\Carshandler.php');
  include 'C:\xampp\htdocs\CarsProject\businesslayer\Usershandler.php';
?>

<!DOCTYPE html>
<?php $title = 'Home'; ?>
<?php $metaTags = 'tag1 tag2'; ?>
<?php $currentPage = 'index'; ?>

<?php
include('C:\xampp\htdocs\CarsProject\viewlayer\css-styling\stylingone.php');
?>

<?php $currentPage = 'Welcome'; ?>
<?php
//include('C:\xampp\htdocs\CarsProject\index.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
</head>
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
          <a href= "cars\Carinformation.php?id=<?php echo $data[$i]['id']; ?>">
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
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["email"]); ?></b>. Welcome to our site.</h1>
    </div>
    <p>
        <!--<a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>--> <!--USE THIS FOR THE FUTURE EVVENTUALLY-->
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
</body>
</html>
