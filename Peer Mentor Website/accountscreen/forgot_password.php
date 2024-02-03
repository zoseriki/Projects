<!-- Zainab Seriki-->
<!-- This is to handle the password reset -->

<!-- forgot_password.php -->
<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>
	<link rel="stylesheet" type="text/css" href="logregstyle.css">
</head>
<body>
	<header>
        <a href="https://swe.umbc.edu/~spark35/is448/deliverable6/homescreen/homescreen.html"><img src="logo.png" alt="Team Logo" height="110" width="110"></a>
        <h2>Account</h2>
    </header>
	<h1>Forgot Password</h1>
	
	<!-- Form for users to enter a new password -->
	<form method="post" action="reset_password.php">
		<label for="username">Username:</label>
		<input type="text" name="username" required>

		<label for="new_password">New Password:</label>
		<input type="password" name="new_password" required>

		<button type="submit" name="reset_password">Reset Password</button>
	</form>
</body>
</html>
