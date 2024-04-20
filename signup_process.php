<?php
// Include the database connection file
include "connection.php";

// Retrieve form data using $_POST
$company_name = $_POST['company_name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Encrypt the password (you should use a more secure method like bcrypt in a real application)
$hashed_password = md5($password);

// SQL query to insert data into the company table
$sql = "INSERT INTO company (company_name, email, password) VALUES ('$company_name', '$email', '$hashed_password')";

// Execute the query
if (mysqli_query($conn, $sql)) {
    echo "Sign up successful!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?><?php
// Include the database connection file
include "connection.php";

// Retrieve form data using $_POST
$company_name = $_POST['company_name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Encrypt the password (you should use a more secure method like bcrypt in a real application)
$hashed_password = md5($password);

// SQL query to insert data into the company table
$sql = "INSERT INTO company (company_name, email, password) VALUES ('$company_name', '$email', '$hashed_password')";

// Execute the query
if (mysqli_query($conn, $sql)) {
    // Redirect to the login page after successful signup
    header("Location: login.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>

