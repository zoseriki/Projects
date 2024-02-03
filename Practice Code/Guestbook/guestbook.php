<!DOCTYPE html>
<html lang="EN">
  <head>
    <title> insert guestbook comment </title>
	<link rel="stylesheet" type="text/css" href="form_proc.css" />
  </head>
  <body>

<?php
  //connect to database
  $db = mysql_connect("studentdb-maria.gl.umbc.edu", "zseriki1", "zseriki1", "zseriki1");

//get values from html form and save the in php variables

$name = $_POST{"name"};
$comment = $_POST{"comments"};
$phone = $_POST{"phone"};

//create SQL Query

  $constructed_query = "INSERT INTO guestbook(username, comment_text, phone_number)
  VALUES ('$name', '$comment', '$phone')";

//Execute the Query
  $result = mysql_query($db, $constructed_query);
?>

  </body>
  </html>