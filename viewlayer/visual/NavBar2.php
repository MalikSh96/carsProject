<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  /* background-color: #333; */
  background-color: orange;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  /*background-color: #ddd;*/
  background-color: black;
  color: white;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}

.button1:hover{
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
  background-color: orange;
}

.button1 {
  background-color: black;
  border: none;
  color: white;
  padding: 10px 30px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 10px;
  margin: 8px 6px;
  cursor: pointer;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
}

.button2:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
  background-color: black;
}

.button2 {
  background-color: orange;
  border: none;
  color: white;
  padding: 10px 30px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 10px;
  margin: 8px 6px;
  cursor: pointer;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
}
</style>
</head>
<body>

<div class="topnav">
  <?php
  // Define each name associated with an URL
  $urls = array(
    'Home'            => '\CarsProject\index.php',
    'Register'        => '\CarsProject\viewlayer\Register.php',
    'Login'           => '\CarsProject\viewlayer\Login.php',
    'About Us'        => '\CarsProject\viewlayer\theCompany\AboutUs.php',
    'Contact Us'      => '\CarsProject\viewlayer\theCompany\ContactUs.php'
    //'Register a car'  => '\CarsProject\viewlayer\adminrelated\CreateCar.php'//,
    //'Delete a car'    => '\CarsProject\viewlayer\adminrelated\DeleteCar.php'
    //If you need more pages add here
  );
  foreach ($urls as $name => $url) {
    print (($currentPage === $name) ? ' class="active" ': '').
    '<a href="'.$url.'">'.$name.'</a>';
  }
  ?>
</div>
</body>
</html>
