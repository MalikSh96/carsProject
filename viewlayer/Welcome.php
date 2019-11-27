<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: Login.php");
    exit;
}
?>

<?php $currentPage = 'Welcome'; ?>
<?php
//include('C:\xampp\htdocs\CarsProject\viewlayer\visual\NavBar2.php');
include('C:\xampp\htdocs\CarsProject\index.php');
//include('C:\xampp\htdocs\CarsProject\viewlayer\css-styling\stylingone.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
</head>
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
