<?php
// Include the database connection file
include "connection.php";

// Retrieve form data using $_POST
$email = $_POST['email'];
$password = $_POST['password'];

// Encrypt the password (you should use the same method used during signup for consistency)
$hashed_password = md5($password);

// SQL query to check if the entered credentials exist in the company table
$sql = "SELECT * FROM company WHERE email = '$email' AND password = '$hashed_password'";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if there's a matching row
if (mysqli_num_rows($result) == 1) {
    // Start a session and store user data if login is successful
    session_start();
    $_SESSION['email'] = $email; // You can store other relevant user data in session as well
    
    // Redirect to home page or any other page after successful login
    header("Location: home.php");
    exit();
} else {
    // Redirect back to the login page with an error message
    header("Location: login.php?error=1");
    exit();
}

// Close the database connection
mysqli_close($conn);
?>
