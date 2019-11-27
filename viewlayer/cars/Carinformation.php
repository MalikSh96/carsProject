<!DOCTYPE>
<html>
<?php $currentPage = 'Carinformation'; ?>
<?php include('C:\xampp\htdocs\CarsProject\viewlayer\visual\NavBar2.php'); ?>
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
    echo "<a href='$url'>back</a>";
    ?>
</head>
</html>
