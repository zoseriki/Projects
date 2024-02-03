<html>
<head>

</head>
<body>


  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $bookName = $_POST["bookName"];
      $author = $_POST["author"];
      $genre = $_POST["genre"];
      $year = $_POST["year"];

      // Check for empty values
      if (empty($bookName) || empty($author) || empty($genre) || empty($year)) {
          echo "All fields are required. Please go back and fill out the form.";
      } else {
          // Open the text file in append mode and write the data
          $file = fopen("/afs/umbc.edu/users/z/s/zseriki1/pub/text-files/books.txt", "a");
          fwrite($file, "Book Name: $bookName\n");
          fwrite($file, "Author: $author\n");
          fwrite($file, "Genre: $genre\n");
          fwrite($file, "Year Published: $year\n");
          fwrite($file, "----------------------\n");
          fclose($file);

          // Display success message and provide a link back to the form
          echo "Book has been added to the registry.<br>";
          echo '<a href="library.html">Add Another Book</a>';
      }
  }
  
  ?>


</body>
</html>