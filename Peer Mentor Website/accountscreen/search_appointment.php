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

    // Get search query from HTML form and save it in a PHP variable
    $search_query = $_POST["search_query"];

    // Validate the input (you'll need to replace this with your own validation logic)
    if (empty($search_query)) {
        echo "Please enter a search query.";
    } else {
        // Create SQL query to search appointments
        $constructed_query = "SELECT * FROM appointments WHERE appointment_id LIKE '%$search_query%' OR appointment_date LIKE '%$search_query%' OR appointment_time LIKE '%$search_query%' OR appointment_location LIKE '%$search_query%' OR appointment_mentor LIKE '%$search_query%'";

        // Execute the query
        $result = mysqli_query($db, $constructed_query);

        if (!$result) {
            echo "Error: " . $constructed_query . "<br>" . mysqli_error($db);
        } else {
            // Fetch all matching appointments and display them
            while ($row = mysqli_fetch_assoc($result)) {
                echo "Appointment ID: " . $row['appointment_id'] . "<br>";
                echo "Date: " . $row['appointment_date'] . "<br>";
                echo "Time: " . $row['appointment_time'] . "<br>";
                echo "Location: " . $row['appointment_location'] . "<br>";
                echo "Mentor: " . $row['appointment_mentor'] . "<br><br>";
            }
        }
    }

    echo "<p><a href='https://swe.umbc.edu/~spark35/is448/deliverable6/accountscreen/account.php'>Go back</a></p>";
    ?>
</body>