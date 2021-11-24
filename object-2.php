<?php

$title = "News question 2";
$question = "Is Trump a fascist";
$answer = "By most definitions, he doesn't have the balls to be a real fascist, but gelded fascists are the most dangerous kind.";
$code = "Alert(This is a message.)";
$date = "Nov. 22, 2021";
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8"/>
    <title><?php echo $title; ?></title>
  </head>
  <body>
      <h1><?php echo $question; ?></h1>
      <pre><?php echo $code; ?></pre>
      <p><?php echo $answer; ?></p>
      <p>Answered <?php echo $date; ?></p>
  </body>
</html>
