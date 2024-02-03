<!--Zainab Seriki-->
<!-- reset_password.php -->
<!DOCTYPE html>
<html lang="EN">
  <head>
    <title> Reset Password</title>
	<link rel="stylesheet" type="text/css" href="logregstyle.css" />
  </head>
  <body>
  <?php
  session_start();
  
	#connect to mysql database
$db = mysqli_connect("studentdb-maria.gl.umbc.edu","spark35","spark35","spark35");

if (mysqli_connect_errno())
	exit("Error - could not connect to MySQL");	

if(isset($_POST['resetsubmit'])){//upon submiting the update button, they will use these variables
	$password =htmlspecialchars($_POST["password"]);

	
	//$username =htmlspecialchars($_POST["username1"]);
 // Validate the new password using preg_match
    if (!preg_match('/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) {
        // Password doesn't meet the requirements
        echo "Password must include at least one letter, one number, and one special character.";
        exit();
    }

	
	///Updates the data from the database
	$username = $_SESSION['username'];
	$constructed_query = "UPDATE Account3 SET password='".$password."' WHERE username = '".$_SESSION['username']."'";
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

<div><!--form data for submission of reset password-->
<h1>Reset Password Form</h1>
  <form action="reset_password.php" method="post">


        <label>Username</label>

        <input type="text" name="username"  placeholder="username"><br> 
		
		<label>Password</label>

        <input type="password" name="password"  placeholder="Password"><br> 
			
		<button type="submit" name="resetsubmit" class="btn">Reset</button>

	</form>
	</div>
   
</body>
</html>




