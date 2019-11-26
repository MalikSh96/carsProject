<!DOCTYPE>
<!--
Links:
https://teamtreehouse.com/community/what-is-the-different-between-head-and-header-again-and-what-goes-inside-each
-->

<html>
<head>
<body>
<style>
  <?php include 'viewlayer\css-styling\navbar-styling.css'; ?>
</style>
  <header class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <a href="#" class="navbar-brand"></a>
        <button type="button" class="navbar-toggle" data-toggle="collapse"
            data-target=".navbar-collapse"><i class="fa fa-bars"></i></button>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <?php
          // Define each name associated with an URL
          $urls = array(
            'Home'        => '/',
            'Login'       => '\CarsProject\viewlayer\Login.php',
            'About Us'    => '\CarsProject\viewlayer\theCompany\AboutUs.php',
            'Contact Us'  => '\CarsProject\viewlayer\theCompany\ContactUs.php'
            //If you need more pages add here
          );
          foreach ($urls as $name => $url) {
            print '<li '.(($currentPage === $name) ? ' class="active" ': '').
            '><a href="'.$url.'">'.$name.'</a></li>';
          }
          ?>
        </ul>
      </div>
    </div>
  </header>
</body>
</head>
</html>
