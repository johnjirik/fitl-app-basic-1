<?php

  $id = $_REQUEST['id'];

  // create emply variables to deal with non-existent id values
  $object = array(
    'title' => '',
    'question' => '',
    'answer' => '',
    'msg' => '',
    'publication_date' => '',
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
   // echo 'Connected successfully!';

   // connect to the fitl-app-basic-1
   $connection->select_db('fitlrevision');

   // Query to select the SplObjectStorage
   // SELECT * FROM [table] WHERE id = n
   $sql = 'SELECT * FROM fitlrevisionnews WHERE id = ' . $id;

   // execute the Query
   $result = $connection->query($sql);

// FIXING THE ALIGNMENT!
// Check for and retrieve the object

if ($result->num_rows > 0) {
  $object = $result->fetch_assoc();
  // echo '<pre>';
  // print_r($object);
  // echo '</pre>';
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
      <pre><?php echo $object['msg']; ?></pre>
      <p><?php echo $object['answer']; ?></p>
      <p>Answered <?php echo $object['publication_date']; ?></p>
  </body>
</html>
