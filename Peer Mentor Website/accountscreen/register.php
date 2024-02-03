<!--Savannah Park-->

<!DOCTYPE html>
<html lang="EN">
  <head>
    <title> Register  </title>
	<link rel="stylesheet" type="text/css" href="logregstyle.css" />
  </head>
  <body>

<?php
#connect to mysql database
$db = mysqli_connect("studentdb-maria.gl.umbc.edu","spark35","spark35","spark35");

if (mysqli_connect_errno())
	exit("Error - could not connect to MySQL");

    $username = $_POST["username"];
	$email = $_POST["email"];
	$major=$_POST["major"];
    $password = $_POST["password"];
	$phoneno = $_POST["phoneno"];


    
	//inserts user form submission into the database
	$constructed_query = "INSERT INTO Account3 (username, email_add, major_type, password, phone_no)
	VALUES('$username', '$email','$major','$password',$phoneno)";
	
	//Execute the query
	$result=mysqli_query($db,$constructed_query);

?>
<!--Leads user to next step(login page) after inserting the data into the database-->
<div class="continue">
<p> Account Registered.</p>
<p><a class="buttoncontinue" href="login.html"> Login Now. </a></p>
</div>
</body>
</html>

