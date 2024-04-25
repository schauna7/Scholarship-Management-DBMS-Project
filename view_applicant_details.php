<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Details</title>
</head>
<body>
    <h2>Applicant Details</h2>
    <?php
    // Include the database connection file
    include "connection.php";

    // Check if the user ID parameter is set in the URL
    if(isset($_GET['user_id'])) {
        // Get the user ID from the URL
        $userId = $_GET['user_id'];

        // Query to get the user details using the user ID
        $sql = "SELECT * FROM users WHERE id = '$userId'";
        $result = mysqli_query($conn, $sql);

        // Check if the user exists
        if ($result->num_rows > 0) {
            // Display the details of the user
            while ($row = $result->fetch_assoc()) {
                echo "<p><strong>ID:</strong> " . $row['id'] . "</p>";
                echo "<p><strong>Username:</strong> " . $row['username'] . "</p>";
                echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
                echo "<p><strong>Date of Birth:</strong> " . $row['dob'] . "</p>";
                echo "<p><strong>State:</strong> " . $row['state'] . "</p>";
                echo "<p><strong>Caste:</strong> " . $row['caste'] . "</p>";
                echo "<p><strong>Tenth Score:</strong> " . $row['tenth_score'] . "</p>";
                echo "<p><strong>Twelfth Score:</strong> " . $row['twelfth_score'] . "</p>";
                echo "<p><strong>Annual Income:</strong> " . $row['annual_income'] . "</p>";
                echo "<p><strong>Nationality:</strong> " . $row['nationality'] . "</p>";
                echo "<p><strong>Gender:</strong> " . $row['gender'] . "</p>";
            }
        } else {
            echo "<p>User not found.</p>";
        }

        // Close the database connection
        mysqli_close($conn);
    }
    ?>
</body>
</html>
