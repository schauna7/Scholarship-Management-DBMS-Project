<?php
// Assuming you have already established a database connection
// Replace DB_HOST, DB_USER, DB_PASSWORD, and DB_NAME with your actual database credentials
include 'connection.php';

// Start session to get the logged-in user's username
session_start();
if (!isset($_SESSION['username'])) {
    // Redirect or handle the case where the user is not logged in
    header("Location: login.php");
    exit();
}

// Fetch user information from the database
$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error retrieving user information: " . mysqli_error($conn));
}

// Check if user exists
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    die("User not found");
}

// Handle form submission for updating user information
if (isset($_POST['update'])) {
    $id = $row['id'];
    $dob = $_POST['dob'];
    $state = $_POST['state'];
    $caste = $_POST['caste'];
    $tenth_score = $_POST['tenth_score'];
    $twelfth_score = $_POST['twelfth_score'];
    $annual_income = $_POST['annual_income'];
    $nationality = $_POST['nationality'];
    $gender = $_POST['gender'];

    // Prepare SQL statement for updating user information
    $update_sql = "UPDATE users SET dob = '$dob', state = '$state', caste = '$caste', tenth_score = $tenth_score, twelfth_score = $twelfth_score, annual_income = $annual_income, nationality = '$nationality', gender = '$gender' WHERE id = $id";

    if (mysqli_query($conn, $update_sql)) {
        echo "User information updated successfully";
    } else {
        echo "Error updating user information: " . mysqli_error($conn);
    }
}

// Handle form submission for deleting user account
if (isset($_POST['delete'])) {
    // Display a confirmation message using JavaScript
    echo "<script>
            var confirmDelete = confirm('Are you sure you want to delete your account?');
            if (confirmDelete) {
                window.location.href = 'viewinfo.php?confirm=yes';
            }
          </script>";
}

// Handle deletion confirmation
if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
    $backup_sql = "INSERT INTO users_backup SELECT * FROM users WHERE id = {$row['id']}";
    if (mysqli_query($conn, $backup_sql)) {
        $delete_sql = "DELETE FROM users WHERE id = {$row['id']}";
        if (mysqli_query($conn, $delete_sql)) {
            echo "<script>alert('User account deleted successfully');</script>";
            // Redirect to logout page or any other appropriate action after deletion
            header("Location: logout.php");
            exit();
        } else {
            echo "Error deleting user account: " . mysqli_error($conn);
        }
    } else {
        echo "Error backing up user information: " . mysqli_error($conn);
    }
}
?>

<<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    <link rel="stylesheet" href="viewinfo.css">
</head>
<body>
    <div class="container">
        <h2>User Information</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" value="<?php echo $row['dob']; ?>" required>
            </div>

            <div class="form-group">
                <label for="state">State:</label>
                <input type="text" id="state" name="state" value="<?php echo $row['state']; ?>" required>
            </div>

            <div class="form-group">
                <label for="caste">Caste:</label>
                <input type="text" id="caste" name="caste" value="<?php echo $row['caste']; ?>" required>
            </div>

            <div class="form-group">
                <label for="tenth_score">10th Score:</label>
                <input type="number" id="tenth_score" name="tenth_score" value="<?php echo $row['tenth_score']; ?>" required>
            </div>

            <div class="form-group">
                <label for="twelfth_score">12th Score:</label>
                <input type="number" id="twelfth_score" name="twelfth_score" value="<?php echo $row['twelfth_score']; ?>" required>
            </div>

            <div class="form-group">
                <label for="annual_income">Annual Income:</label>
                <input type="number" id="annual_income" name="annual_income" value="<?php echo $row['annual_income']; ?>" required>
            </div>

            <div class="form-group">
                <label for="nationality">Nationality:</label>
                <input type="text" id="nationality" name="nationality" value="<?php echo $row['nationality']; ?>" required>
            </div>

            <div class="form-group">
                <label for="gender">Gender:</label>
                <input type="text" id="gender" name="gender" value="<?php echo $row['gender']; ?>" required>
            </div>

            <button type="submit" name="update" class="btn">Update</button>
            <button type="submit" name="delete" class="btn delete">Delete Account</button>
        </form>
    </div>
</body>
</html>
