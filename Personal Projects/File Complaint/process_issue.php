<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  

	 <link rel="stylesheet" type="text/css" href="issueStyle.css"/>   
	 <div class="titleStyle">
	 <title>Issue Processing Page</title>

<?php
$db= mysqli_connect("studentdb-maria.gl.umbc.edu","nafisae1", "nafisae1", "nafisae1");

$name = $_POST['name'];
$email = $_POST['email'];
$date = $_POST['date'];
$issueType = $_POST['issueType'];
$issue = $_POST['issue'];

if (empty($name) || empty($email) || empty($date)|| empty($issueType) || empty($issue)) {
    echo "<a href='issue.html'> Error: All fields must be filled</a>";
    exit;
}
	$constructed_query = "INSERT INTO reports(name, email, date, issue_type, issue_description) values ('$name', '$email','$date','$issueType','$issue')";
	$result = mysqli_query($db, $constructed_query);
	
	if ($result) {
    echo 'Issue reported successfully.';
    header("Location: issueView.php");

}
?>
</div>