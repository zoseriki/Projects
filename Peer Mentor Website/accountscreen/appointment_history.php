<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="begin.css">
</head>

<body>
    <?php
    // Connect to database
    $db = mysqli_connect("studentdb-maria.gl.umbc.edu", "spark35", "spark35", "spark35");

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Create SQL query to fetch all appointments
    $constructed_query = "SELECT * FROM appointments";

    // Execute the query
    $result = mysqli_query($db, $constructed_query);

    if (!$result) {
        echo "Error: " . $constructed_query . "<br>" . mysqli_error($db);
    } else {
        // Fetch all appointments and display them
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='appointment'>";
            echo "Appointment ID: " . $row['appointment_id'] . "<br>";
            echo "<div class='details' style='display: none'>";
            echo "Date: " . $row['appointment_date'] . "<br>";
            echo "Time: " . $row['appointment_time'] . "<br>";
            echo "Location: " . $row['appointment_location'] . "<br>";
            echo "Mentor: " . $row['appointment_mentor'] . "<br>";
            echo "</div></div>";
        }
    }

    ?>
    <script>
        var appointments = document.getElementsByClassName('appointment');

        // Add a click event listener to each appointment
        for (var i = 0; i < appointments.length; i++) {
            appointments[i].addEventListener('click', function() {
                // 'this' refers to the clicked appointment div
                var appointmentDetails = this.getElementsByClassName('details')[0];

                // Toggle the visibility of the details
                if (appointmentDetails.style.display === 'none') {
                    appointmentDetails.style.display = 'block';
                } else {
                    appointmentDetails.style.display = 'none';
                }
            });
        }
    </script>
    <style>
        .appointment {
            cursor: pointer;
            border: 1px solid #000;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            background-color: lightblue;
        }
    </style>

</body>

</html>