<?php
  //Link: https://css-tricks.com/snippets/javascript/go-back-button/
  $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
  echo "<a href='$url'>Back</a>";
?>
