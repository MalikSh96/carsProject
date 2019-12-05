<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: Login.php");
    exit;

}
// Check if the user is already logged in, if yes then redirect him to welcome page
elseif(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true
&& $_SESSION["isAdmin"] == 1){
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
include('C:\xampp\htdocs\CarsProject\viewlayer\css-styling\stylingoneadmin.php');
?>

<?php $currentPage = 'WelcomeAdmin'; ?>
<?php
//include('C:\xampp\htdocs\CarsProject\index.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
</head>
<head>
  <!--Link used: https://www.webslesson.info/2016/10/datatables-jquery-plugin-with-php-mysql-and-bootstrap.html-->
  <!--DATATABLES RELATED-->
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

<form action="\CarsProject\viewlayer\adminrelated\CreateCar.php">
  <button class="button button1">Register a car</button>
</form>
<form action="\CarsProject\feedgeneration\XmlFeedGeneration.php">
  <button class="button button1">Generate/Update XML feed</button>
</form>
<form action="\CarsProject\feedgeneration\JsonGenerator.php">
  <button class="button button1">Generate/Update JSON feed</button>
</form>

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
          <th></th>
          <th></th>
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
        <td>
          <form action="\CarsProject\viewlayer\adminrelated\DeleteCar.php">
            <button class="button button2">Delete</button>
          </form>
        </td>
        <td>
          <form action="\CarsProject\viewlayer\adminrelated\EditCar.php">
            <button class="button button2">Edit</button>
          </form>
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
<?php } ?>

<?php
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    //header("location: Login.php");
    include('C:\xampp\htdocs\CarsProject\viewlayer\unauthorizedaccess\DenyAccess.php');
    //exit;
}
?>
