<html>
<head>

</head>
<title> Insert Employee Info </title>
  <link rel="stylesheet" type="text/css" href="form_proc.css" />
<body>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstName = $_POST["firstName"];
  $lastName = $_POST["lastName"];
  $address = $_POST["address"];
  $employeeID = $_POST["employeeID"];

  // Validate Employee ID format
  if (preg_match("/^[A-Za-z]{4}\d{4}$/", $employeeID)) {
    echo "Employee ID was in correct format. <br>";
    echo "Name: $firstName $lastName <br>";
    echo "Address: $address <br>";
    echo "Employee ID: $employeeID";
  } else {
    echo "Employee ID was incorrect. Go back and re-enter name and Employee ID.";
  }
}
?>

</body>

</html>