<?php

// Create connection
$conn = new mysqli("studentdb-maria.gl.umbc.edu", "spark35", "spark35", "spark35");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch information from database
$sql = "SELECT * FROM appointments";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table style='border-collapse: collapse; width: 100%;'><tr style='background-color: lightblue;'><th>ID</th><th>Date</th><th>Time</th><th>Location</th><th>Mentor</th></tr>";
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td style='padding: 8px; border: 1px solid #ddd;'>" . $row["appointment_id"] . "</td><td style='padding: 8px; border: 1px solid #ddd;'>" . $row["appointment_date"] . "</td><td style='padding: 8px; border: 1px solid #ddd;'>" . $row["appointment_time"] . "</td><td style='padding: 8px; border: 1px solid #ddd;'>" . $row["appointment_location"] . "</td><td style='padding: 8px; border: 1px solid #ddd;'>" . $row["appointment_mentor"] . "</td></tr>";
		 
    }
    echo "</table>";
	 echo "<p><a href='https://swe.umbc.edu/~spark35/is448/deliverable6/accountscreen/D5%20scheduler.html'>Go back</a></p>";
} else {
    echo "0 results";
}

$conn->close();
?>
