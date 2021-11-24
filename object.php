<?php

  $id = $_REQUEST['id'];

  // create emply variables to deal with non-existent id values
  $object = array(
    'title' => '',
    'question' => '',
    'answer' => '',
    'msg' => '',
    'date' => '',
   );

   // Database connections credentials
   $servername = 'localhost';
   $username = 'homestead';
   $password = 'secret';

   // Create connections
   $connection = new mysqli($servername, $username, $password);

   // Check for an date_get_last_errors
   if ($connection->connect_error) {
     echo 'Connection failed: ' , $connection->connect_error;
     exit;
   }

   // Otherwise, connected successfully!
   echo 'Connected successfully!';

   // connect to the fitl-app-basic-1
   $connection->select_db('fitl-revision');

   // Query to select the SplObjectStorage
   // SELECT * FROM [table] WHERE id = n
   $sql = 'SELECT * FROM fitl-revision-news WHERE id = ' . $id;

   // execute the Query
   $result = $connection->query($sql);

// FIXING THE ALIGNMENT!
// Check for and retrieve the object

if ($result->num_rows > 0) {
  $object = $result->fetch_assoc();
  echo '<pre>';
  print_r($object);
  echo '</pre>';
}

  // set the object variables
  // based on the id value from the URL
  if ($id == 1) {
    // if id is 1
    $object = array(
      'title' => "News item #1",
      'question' => "I need a news item #1",
      'answer' => "I can't find it.",
      'code' => "Alert(This is a message)",
      'date' => "Nov. 21, 2021",
    );
  }
  elseif ($id == 2) {
    // if id is 2
    $object = array(
      'title' => 'News question 2',
      'question' => 'Is Trump a fascist?',
      'answer' => "By most definitions, he doesn't have the balls to be a real fascist, but gelded fascists are the most dangerous kind.",
      'code' => 'Alert(This is a message.)',
      'date' => 'Nov. 22, 2021',
    );
  }
  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8"/>
    <title><?php echo $object['title']; ?></title>
  </head>
  <body>
      <h1><?php echo $object['question']; ?></h1>
      <pre><?php echo $object['code']; ?></pre>
      <p><?php echo $object['answer']; ?></p>
      <p>Answered <?php echo $object['date']; ?></p>
  </body>
</html>
