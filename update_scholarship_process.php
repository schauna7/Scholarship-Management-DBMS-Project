<?php
// Include the database connection file
include "connection.php";

// Retrieve form data using $_POST
$scholarship_id = $_POST['scholarship_id'];
$scholarship_name = $_POST['scholarship_name'];
$caste = $_POST['caste'];
$state = $_POST['state'];
$gender = $_POST['gender'];
$tenth_score = $_POST['tenth_score'];
$twelfth_score = $_POST['twelfth_score'];
$nationality = $_POST['nationality'];
$annual_income = $_POST['annual_income'];
$grant_amount = $_POST['grant_amount'];
$scholarship_description = $_POST['scholarship_description'];
// Add more fields as needed

// SQL query to update scholarship details in the database
$sql = "UPDATE scholarship SET 
        scholarship_name = '$scholarship_name', 
        caste = '$caste', 
        state = '$state', 
        gender = '$gender', 
        tenth_score = '$tenth_score', 
        twelfth_score = '$twelfth_score', 
        nationality = '$nationality', 
        annual_income = '$annual_income', 
        grant_amount = '$grant_amount', 
        scholarship_description = '$scholarship_description' 
        WHERE scholarship_id = '$scholarship_id'";

// Execute the query
if (mysqli_query($conn, $sql)) {
    echo "Scholarship updated successfully!";
} else {
    echo "Error updating scholarship: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
