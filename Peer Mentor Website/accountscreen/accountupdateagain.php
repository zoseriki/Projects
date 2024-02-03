<!--Savannah Park-->

<!DOCTYPE html>
<html lang="EN">
  <head>
    <title> Updating</title>
	<link rel="stylesheet" type="text/css" href="logregstyle.css" />
  </head>
  <body>
  <?php
  session_start();
  
	#connect to mysql database
$db = mysqli_connect("studentdb-maria.gl.umbc.edu","spark35","spark35","spark35");

if (mysqli_connect_errno())
	exit("Error - could not connect to MySQL");	

if(isset($_POST['updatesubmit'])){//upon submiting the update button, they will use these variables
	
	//$username =htmlspecialchars($_POST["username1"]);
    $email =htmlspecialchars($_POST["email"]);
	$profilemajor =htmlspecialchars($_POST["majorType"]);
	$phoneno =htmlspecialchars($_POST["phoneno"]);
	
	//$username = mysqli_real_escape_string($db, "$username");
	$email = mysqli_real_escape_string($db, "$email");
	$profilemajor = mysqli_real_escape_string($db, "$profilemajor");
	$phoneno = mysqli_real_escape_string($db, "$phoneno");
	
	///Updates the data from the database
	$username = $_SESSION['username'];
	$constructed_query = "UPDATE Account3 SET email_add='".$email."', phone_no='".$phoneno."', major_type='".$profilemajor."' WHERE username = '".$_SESSION['username']."'";
	$result=mysqli_query($db,$constructed_query);
	
	if ($result)///redirects user to account page if true
	{
	header("Location: account.php");
    exit();
	}
	else{
		echo 'Please check your query';
	}
	}
?>

<div><!--form data for submission of update profile-->
<h1>Update Form</h1>
  <form action="accountupdateagain.php" method="post">

			
		<!--<label>User Name</label>

        <input type="text" name="username1" placeholder="User Name"><br>-->

        <label>Email Address</label>

        <input type="text" name="email"  placeholder="Email"><br> 
		
		<label>Phone No</label>

        <input type="text" name="phoneno"  placeholder="Phoneno"><br> 
		
		<label>Major</label>

        <input type="text" name="majorType" placeholder="Major"><br> 
			
		<button type="submit" name="updatesubmit" class="btn">Update</button>

	</form>
	</div>
   
</body>
</html>