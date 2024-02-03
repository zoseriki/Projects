<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issue View Page</title>
	<link rel="stylesheet" type="text/css" href="issueStyle.css"/>
</head>
<body>
	<div class="titleStyle">  
	<h2>Issue View</h2>

  <?php
    $db = mysqli_connect("studentdb-maria.gl.umbc.edu", "nafisae1", "nafisae1", "nafisae1");

    $query = "SELECT * FROM reports";
    $result = mysqli_query($db, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div>';
            echo '<strong>Name:</strong> ' . htmlspecialchars($row['name']) . '<br>';
            echo '<strong>Email:</strong> ' . htmlspecialchars($row['email']) . '<br>';
			echo '<strong>Date:</strong> ' . htmlspecialchars($row['date']) . '<br>';
            echo '<strong>Issue Type:</strong> ' . htmlspecialchars($row['issue_type']) . '<br>';
            echo '<strong>Issue Description:</strong> ' . htmlspecialchars($row['issue_description']) . '<br>';
            echo '</div><br>';
        }
    } else {
        echo 'Error fetching issue entries.';
    }
    ?>
    <br>
    <a href="issue.html">Have another issue to report?</a>
		</div>
</body>
</html>