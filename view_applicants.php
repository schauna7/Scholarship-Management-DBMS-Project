<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Applicants</title>
</head>
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

    // Query to get the users who have applied for the scholarship
    $sql = "SELECT users.id, users.username, users.email, users.gender,  users.state FROM elegible INNER JOIN users ON elegible.user_id = users.id WHERE elegible.scholarship_id = '$scholarshipId'";
    $result = mysqli_query($conn, $sql);

    // Check if there are any applicants
    if (mysqli_num_rows($result) > 0) {
        // Display the details of each applicant
        echo "<ul>";
        while ($row = mysqli_fetch_assoc($result)) {
            // Make the applicant's name clickable to view details
            echo "<li><a href='view_applicant_details.php?user_id=" . $row['id'] . "'>Username: " . $row['username'] . "</a>, Email: " . $row['email'] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No applicants found for this scholarship.</p>";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
</body>
</html>
