<?php
  include_once 'header.php';
  $title = "404 Error";
  $output = str_replace('%TITLE%', $title, $output);
  echo $output;
?>

<img src="../img/404.gif"  width="70%">

<?php
  include_once 'footer.php';
?>

