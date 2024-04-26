<?php
session_start();
include "connection.php";

if(isset($_SESSION['student_id']) && isset($_GET['scholarship_id'])) {
    $userId = $_SESSION['student_id']; // Change this to use student_id
    $scholarshipId = $_GET['scholarship_id'];
    
    // Get the current date
    $applicationDate = date("Y-m-d");

    // Insert into the eligible table
    $sql = "INSERT INTO elegible (user_id, scholarship_id, application_date) VALUES ('$userId', '$scholarshipId', '$applicationDate')";
    if(mysqli_query($conn, $sql)) {
        // Redirect back to student_home.php
        header("Location: student_home.php");
        exit(); // Ensure script stops execution after redirection
    } else {
        echo "Error submitting application: " . mysqli_error($conn);
    }
} else {
    echo "Unauthorized access!";
}
?>
