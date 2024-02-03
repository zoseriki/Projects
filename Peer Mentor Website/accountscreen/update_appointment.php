<!--Sarmad Ashraf-->

<!DOCTYPE html>
<html lang="EN">

<head>
    <title> Update Appointment </title>
    <link rel="stylesheet" type="text/css" href="begin.css" />
</head>
<?php
// Connect to database
$db = mysqli_connect("studentdb-maria.gl.umbc.edu", "spark35", "spark35", "spark35");

if (mysqli_connect_errno()) {
    echo "Can't connect" . mysqli_connect_error();
}
// Check if form data is set
if (isset($_POST["appointment_id"], $_POST["appointment_date"], $_POST["appointment_time"], $_POST["appointment_location"], $_POST["appointment_mentor"])) {
    // Get values from HTML form and save them in PHP variables
    $appointment_id = htmlspecialchars($_POST["appointment_id"]);
    $appointment_date = htmlspecialchars($_POST["appointment_date"]);
    $appointment_time = htmlspecialchars($_POST["appointment_time"]);
    $appointment_location = htmlspecialchars($_POST["appointment_location"]);
    $appointment_mentor = htmlspecialchars($_POST["appointment_mentor"]);

    // Create SQL query to fetch the appointment with the given ID
    $select_query = "SELECT * FROM appointments WHERE appointment_id = '$appointment_id'";

    // Execute the query
    $select_result = mysqli_query($db, $select_query);

    // Check if the SELECT query returned a result
    if (mysqli_num_rows($select_result) > 0) {
        // The appointment ID exists, proceed with the UPDATE query

        // Create SQL query to update an appointment
        $update_query = "UPDATE appointments SET appointment_date = '$appointment_date', appointment_time = '$appointment_time', appointment_location = '$appointment_location', appointment_mentor = '$appointment_mentor' WHERE appointment_id = '$appointment_id'";

        // Execute the query
        $update_result = mysqli_query($db, $update_query);

        if (!$update_result) {
            echo "Error: " . $update_query . "<br>" . mysqli_error($db);
        } else {
            echo "<p>Appointment updated successfully.</p>";
            echo "<p><a href='https://swe.umbc.edu/~spark35/is448/deliverable6/accountscreen/account.php'>Go back</a></p>";
        }
    } else {
        // The appointment ID does not exist, display an error message
        echo "<p>Error: Appointment ID does not exist. Please check the List of Appointments and input correct ID.</p>";
        echo "<p><a href='https://swe.umbc.edu/~spark35/is448/deliverable6/accountscreen/update_appointment.html'>Go back</a></p>";
    }
} else {
    echo "No form data received.";
}


?>

<body>

</html>