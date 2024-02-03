<!--Savannah Park, Sarmad Ashraf-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!--<meta charset="UTF-8">-->
    <link rel="stylesheet" type="text/css" href="begin.css" />
    <!-- Include jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <header>
        <img src="logo.png" alt="Team Logo" height="110" width="110">
        <h1>Account</h1>
        <div class="icon-buttons">
            <button class="icon-button"><a class="iconb" href="https://swe.umbc.edu/~spark35/is448/deliverable6/homescreen/homescreen.html">&#8592</a></button> <!-- Go Back icon -->
        </div>
    </header>

    <!-- This is the start of a section -->
    <section class="profile">
        <h2 id="profile-head">Profile</h2>
        <img src="profile.png" alt="Profile Picture" width="200" height="200">


        <!-- A button to open the popup form -->
        <a href="accountupdateagain.php"><button class="openbutton"> Edit Profile</button></a>

        <?php
        // Start the session
        session_start();

        #connect to mysql database
        $db = mysqli_connect("studentdb-maria.gl.umbc.edu", "spark35", "spark35", "spark35");

        if (mysqli_connect_errno())
            exit("Error - could not connect to MySQL");

        // Get the user ID from the session variable
        $username = $_SESSION['username'];

        //SELECT the query
        $constructed_query = "SELECT * FROM Account3 WHERE username = '$username'";

        //Execute the query
        $result = mysqli_query($db, $constructed_query);


        $row = $result->fetch_assoc();
        ?>
        <section class="outputprofile">
            <p class="mainoutput">Welcome <?php echo $row['username'] ?>!<br></p>
            <p class="info">
                Email: <?php echo $row['email_add']  ?><br>
                Major: <?php echo $row['major_type']  ?><br>
                Phone No: <?php echo $row['phone_no']  ?><br>
            </p>
        </section>

    </section>

    <section class="appointments">
    <h2>Appointments</h2> <!-- Appointment heading -->
    <div class="appointment-buttons">
        <button id="loadHistory">Appointment History</button>
        <button onclick="location.href='update_appointment.html'">Update Appointment</button>
        <form id="searchForm">
            <input type="text" id="searchQuery" name="search_query" placeholder="Search appointments...">
            <input type="submit" value="Search">
        </form>
    </div>
    <!-- Container to display search results -->
    <div id="searchResults"></div>
</section>


    <!-- Container to display appointment history -->
    <div id="appointmentHistory"></div>

    <section class="password">
        <h2>Password Management</h2> <!-- Password heading -->
        <button><a class="randombutton" href="https://swe.umbc.edu/~spark35/is448/deliverable6/accountscreen/reset_password.php">Change Password</a></button>
       
    </section>

    <footer>
        <img src="logo.png" alt="Team Logo" class="team-logo">
        <p>Sarmad Ashraf • Akshay Chippada • Savannah Park • Zainab Seriki</p>
        <hr> <!-- Separation line -->
        <p>© 2023</p>
    </footer>
    <script>
        $(document).ready(function() {
            $('#loadHistory').on('click', function() {
                // Send AJAX request
                $.ajax({
                    url: 'appointment_history.php', // URL of your PHP script
                    type: 'post',
                    success: function(response) {
                        // Display appointment history
                        $('#appointmentHistory').html(response);
                    }
                });
            });

            $('#searchForm').on('submit', function(e) {
                e.preventDefault();

                // Get search query
                var searchQuery = $('#searchQuery').val();

                // Send AJAX request
                $.ajax({
                    url: 'search_appointment.php', // URL of your PHP script
                    type: 'post',
                    data: {
                        search_query: searchQuery
                    },
                    success: function(response) {
                        // Display search results
                        $('#searchResults').html(response);
                    }
                });
            });
        });
    </script>

</body>

</html>