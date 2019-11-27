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
</style>
</head>
<body>

<div class="topnav">
  <?php
  // Define each name associated with an URL
  $urls = array(
    'Home'        => '\CarsProject\index.php',
    'Register'    => '\CarsProject\viewlayer\Register.php',
    'Login'       => '\CarsProject\viewlayer\Login.php',
    'About Us'    => '\CarsProject\viewlayer\theCompany\AboutUs.php',
    'Contact Us'  => '\CarsProject\viewlayer\theCompany\ContactUs.php'
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
