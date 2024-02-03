<!DOCTYPE html>
<!-- saved from url=(0073)https://swe.umbc.edu/~zzaidi1/is448/chap9-examples/php2/php2/ratings.html -->
<html lang="en">
<head>
  <title>Ratings output page</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" type="text/css" href="form_proc.css"/>
</head>


<body>
  <?php
  $moviename = $_POST["movie_name"];
  $phprating = $_POST["rating"];
?>


<p>The movie name you selected was <?php echo $moviename; ?>. The rating you selected was <?php echo  $phprating; ?></p>




</body>


</html>
  