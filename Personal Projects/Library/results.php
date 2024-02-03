<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Registry</title>
    <link rel="stylesheet" href="display.css">
<body>

  <?php

  // Read data from the text file and display it
  $file = fopen("/afs/umbc.edu/users/z/s/zseriki1/pub/text-files/books.txt", "r");
  if ($file) {
      while (($line = fgets($file)) !== false) {
          echo $line . "<br>";
      }
      fclose($file);
  } else {
      echo "Error reading the file.";
  }
  
  ?>

  <a href="library.html">Go back</a>
    
</body>
</html>














