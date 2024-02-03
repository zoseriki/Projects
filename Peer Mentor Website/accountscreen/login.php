<!--Savannah Park-->

<!DOCTYPE html>
<html lang="EN">
  <head>
    <title> Login  </title>
	<link rel="stylesheet" type="text/css" href="logregstyle.css" />
  </head>
  <body>

<?php
session_start();

#connect to mysql database
$db = mysqli_connect("studentdb-maria.gl.umbc.edu","spark35","spark35","spark35");

if (mysqli_connect_errno())
	exit("Error - could not connect to MySQL");
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
		
$username = mysqli_real_escape_string($db,$_POST["username"]);
$password = mysqli_real_escape_string($db, $_POST["password"]);

if(empty($username)) {
	//Missing username.
					?>
	<p> Please enter username! </p>
	<?php
				}
	else {
	if(empty($password)) {
	//Missing password.
						?>
		<p>  Please enter password! </p>
						<?php
					}
		else {
//Selects the data from the database
$constructed_query = "SELECT * FROM Account3 WHERE username='$username' AND password='$password'";

//Execute the query
	$result=mysqli_query($db,$constructed_query);
	//$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

if(mysqli_num_rows($result) === 1) {
	#Retrieving result from database.
$row = mysqli_fetch_assoc($result);
	#Verifying that username and password match.
if($row['username'] === $username && $row['password'] === $password) {
	//Successful login.
$_SESSION['username']=$username;
header("location: account.php");
}
else{ header("location: login.html");
  }
}
else {
//Unsuccessful login.
header("location: login.html");
	}
		}
	}

 
?>

</body>
</html>