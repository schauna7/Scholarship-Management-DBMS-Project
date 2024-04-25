<?php
// Include the database connection file
include "connection.php";

// Start session to access session variables
session_start();

// Check if user is logged in
if(!isset($_SESSION['username'])){
    header("Location: student_login.php"); // Redirect to login page if not logged in
    exit(); // Ensure script stops execution after redirection
}

// Retrieve logged-in student's ID from session
$student_id = $_SESSION['student_id'];

// Retrieve logged-in student's details from the database
$sql = "SELECT * FROM users WHERE id = '$student_id'";
$result = mysqli_query($conn, $sql);

if(!$result) {
    die("Error retrieving student information: " . mysqli_error($conn));
}

// Check if student exists
if(mysqli_num_rows($result) > 0) {
    $student = mysqli_fetch_assoc($result);
} else {
    die("Student not found");
}

// Query scholarships from the database
$sql = "SELECT * FROM scholarship";
$result = mysqli_query($conn, $sql);

if(!$result) {
    die("Error retrieving scholarships: " . mysqli_error($conn));
}

// Initialize an array to store eligible scholarships
$eligible_scholarships = array();

// Loop through each scholarship to filter eligible ones
while($row = mysqli_fetch_assoc($result)) {
    // Check if the scholarship matches the criteria

    // Check caste
    if ($row['caste'] == $student['caste'] || $row['caste'] == 'All') {
        // Check state
        if ($row['state'] == $student['state'] || $row['state'] == 'All') {
            // Check gender
            if ($row['gender'] == $student['gender'] || $row['gender'] == 'Both') {
                // Check tenth score
                if ($student['tenth_score'] >= $row['tenth_score']) {
                    // Check twelfth score
                    if ($student['twelfth_score'] >= $row['twelfth_score']) {
                        // Check annual income
                        if ($student['annual_income'] <= $row['annual_income']) {
                            // Check nationality
                            if ($row['nationality'] == $student['nationality']) {
                                // Scholarship is eligible, add it to the array
                                $eligible_scholarships[] = $row;
                            }
                        }
                    }
                }
            }
        }
    }
}

// Close the database connection
mysqli_close($conn);
?>
<?php foreach ($eligible_scholarships as $scholarship): ?>
    <li class="list-group-item">
        <h3><?php echo $scholarship['scholarship_name']; ?></h3>
        <p><?php echo $scholarship['scholarship_description']; ?></p>
        <a href="apply_for_scholarship.php?scholarship_id=<?php echo $scholarship['scholarship_id']; ?>" class="btn btn-primary">Apply</a>
    </li>
<?php endforeach; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eligible Scholarships</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"> <!-- Include your custom stylesheet -->
</head>
<body>
    <div class="container mt-4">
        <h1>Eligible Scholarships</h1>
        <?php if(empty($eligible_scholarships)): ?>
            <p>No scholarships are currently available for you.</p>
        <?php else: ?>
            <ul class="list-group">
                <?php foreach ($eligible_scholarships as $scholarship): ?>
                    <?php if(isset($scholarship['scholarship_name']) && isset($scholarship['scholarship_description'])): ?>
                        <li class="list-group-item">
                            <h3><?php echo $scholarship['scholarship_name']; ?></h3>
                            <p><?php echo $scholarship['scholarship_description']; ?></p>
                            <button class="btn btn-primary" onclick="applyForScholarship(<?php echo $scholarship['scholarship_id']; ?>)">Apply</button>

                            <script>
    function applyForScholarship(scholarshipId) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // No message displayed after successful submission
            }
        };
        xhttp.open("GET", "apply_for_scholarship.php?scholarship_id=" + scholarshipId, true);
        xhttp.send();
    }
</script>



                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
