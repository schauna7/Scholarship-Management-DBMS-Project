<?php
// Include the database connection file
include "connection.php";

// Start the session to get the logged-in company's email
session_start();
$company_email = $_SESSION['email'];

// Retrieve form data using $_POST
$scholarship_name = $_POST['scholarship_name'];
$state = $_POST['state'];
$caste = $_POST['caste'];
$gender = $_POST['gender'];
$tenth_score = $_POST['tenth_score'];
$twelfth_score = $_POST['twelfth_score'];
$nationality = $_POST['nationality'];
$annual_income = $_POST['annual_income'];
$grant_amount = $_POST['grant_amount'];
$scholarship_description = $_POST['scholarship_description'];

// SQL query to insert data into the scholarship table
$sql = "INSERT INTO scholarship (scholarship_name, state, caste, gender, tenth_score, twelfth_score, nationality, annual_income, grant_amount, company_id, scholarship_description) VALUES ('$scholarship_name', '$state', '$caste', '$gender', '$tenth_score', '$twelfth_score', '$nationality', '$annual_income', '$grant_amount', '$company_email', '$scholarship_description')";

// Execute the query
if (mysqli_query($conn, $sql)) {
    // Redirect back to the home page after successful scholarship creation
    header("Location: home.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
