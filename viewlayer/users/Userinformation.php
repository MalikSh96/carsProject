<?php
//Using a session to protect the rights of messign around with the page
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true
    && $_SESSION["isAdmin"] == 1){
?>
<!DOCTYPE>
<?php
include('C:\xampp\htdocs\CarsProject\businesslayer\Usershandler.php');
?>
<html>
<?php $currentPage = 'Userinformation'; ?>
<?php
include('C:\xampp\htdocs\CarsProject\viewlayer\css-styling\stylingoneadmin.php');
?>
<head>
  <div>
    <p>
      Here is the user information.
    </p>
  </div>

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
      $data = getUserByEmailHandler($_GET['id']);
      //After we get the size of the array, so that we can loop through it for filling the data
      $datacount = count($data);
      if($datacount > 0)
      {
    ?>
    <table id="datatable" class="table table-hover" align="center">
      <thead>
        <tr>
          <th style="width: 25%">Id</th>
          <th>Email</th>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>Password</th>
          <th>Last login</th>
          <th>Admin status</th>
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
          <?php echo $data[$i]['id']; ?>
        </td>
				<td>
          <?php echo $data[$i]['email']; ?>
				</td>
				<td>
          <?php echo $data[$i]['firstname']; ?>
				</td>
				<td>
          <?php echo $data[$i]['lastname']; ?>
        </td>
				<td>
          <?php echo $data[$i]['password']; ?>
        </td>
				<td>
          <?php echo $data[$i]['lastlogin']; ?>
        </td>
				<td>
          <?php echo $data[$i]['isAdmin']; ?>
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
