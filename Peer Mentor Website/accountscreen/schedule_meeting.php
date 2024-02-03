<?php
// Connect to database
$db = mysqli_connect("studentdb-maria.gl.umbc.edu", "spark35", "spark35", "spark35");

if (mysqli_connect_errno()) {
    echo "Can't connect" . mysqli_connect_error();
}

// Check if form data is set
if (isset($_POST["appointment_date"], $_POST["appointment_time"], $_POST["appointment_location"], $_POST["appointment_mentor"])) {
    // Get values from HTML form and save them in PHP variables
    $appointment_date = htmlspecialchars($_POST["appointment_date"]);
    $appointment_time = htmlspecialchars($_POST["appointment_time"]);
    $appointment_location = htmlspecialchars($_POST["appointment_location"]);
    $appointment_mentor = htmlspecialchars($_POST["appointment_mentor"]);

    // Create SQL query to fetch the appointment with the given ID
    $select_query = "SELECT * FROM appointments WHERE appointment_date = '$appointment_date' && appointment_time = '$appointment_time' && appointment_location = '$appointment_location' && appointment_mentor = '$appointment_mentor'";

    // Execute the query
    $select_result = mysqli_query($db, $select_query);

    // Check if the SELECT query returned a result
    if (mysqli_num_rows($select_result) > 0) {
        // The appointment ID exists, inform that the schedule is not available
        echo "<p>Error: Appointment ID exists. Please check the List of Appointments and input correctly.</p>";
        echo "<p><a href='https://swe.umbc.edu/~spark35/is448/deliverable6/accountscreen/D5%20scheduler.html'>Go back</a></p>";
    } else {
        // The appointment ID does not exist, proceed with adding the schedule

        // Define your update query here (replace it with your actual query)
        $update_query = "INSERT INTO appointments (appointment_date, appointment_time, appointment_location, appointment_mentor) VALUES ('$appointment_date', '$appointment_time', '$appointment_location', '$appointment_mentor')";

        // Execute the query
        $add_schedule = mysqli_query($db, $update_query);

        if (!$add_schedule) {
            echo "Error: " . $update_query . "<br>" . mysqli_error($db);
        } else {
            echo "<p>Appointment added successfully.</p>";
            echo "<p><a href='https://swe.umbc.edu/~spark35/is448/deliverable6/accountscreen/D5%20scheduler.html'>Go back</a></p>";
        }
    }
}
?>
