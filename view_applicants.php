<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Applicants</title>
</head>
<body>
    <h2>Applicants for Scholarship ID: <?php echo $_GET['scholarship_id']; ?></h2>

    <?php
    // Include the database connection file
    include "connection.php";

    // Get the scholarship ID from the URL parameter
    $scholarshipId = $_GET['scholarship_id'];

    // Query to get the unique users who have applied for the scholarship
    $sql = "SELECT DISTINCT users.id, users.username, users.email, users.gender, users.state 
            FROM elegible 
            INNER JOIN users ON elegible.user_id = users.id 
            WHERE elegible.scholarship_id = '$scholarshipId'";
    $result = mysqli_query($conn, $sql);

    // Check if there are any applicants
    if (mysqli_num_rows($result) > 0) {
        // Display the details of each applicant
        while ($row = mysqli_fetch_assoc($result)) {
            // Display a box for each applicant
            echo '<div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">';
            echo "<p><strong>Applicant Name:</strong> " . $row['username'] . "</p>";
            echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
            echo "<p><strong>Gender:</strong> " . $row['gender'] . "</p>";
            echo "<p><strong>State:</strong> " . $row['state'] . "</p>";
            echo '<button onclick="viewApplicantDetails(' . $row['id'] . ')">Applicant Details</button>';
            echo '<button onclick="acceptApplicant(' . $row['id'] . ')">Accept Applicant</button>';
            echo '</div>';
        }
    } else {
        echo "<p>No applicants found for this scholarship.</p>";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>

    <script>
        function viewApplicantDetails(userId) {
            window.location.href = "view_applicant_details.php?user_id=" + userId;
        }

        function acceptApplicant(userId) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    alert(this.responseText); // Display success message
                    // You can also update the UI to reflect the accepted status
                }
            };
            xhttp.open("POST", "accept_applicant.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("user_id=" + userId);
        }
    </script>
</body>
</html>
