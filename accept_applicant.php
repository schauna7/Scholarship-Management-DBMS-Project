<?php
// Include the database connection file
include "connection.php";

// Retrieve user ID from POST data
if(isset($_POST['user_id'])) {
    $userId = $_POST['user_id'];

    // Accept the applicant (perform necessary database operations)
    // For example:
    // $sql = "UPDATE applicants SET status = 'accepted' WHERE user_id = ?";
    // $stmt = $conn->prepare($sql);
    // $stmt->bind_param("i", $userId);
    // $stmt->execute();

    // Send acceptance email
    include "send_acceptance_email.php"; // Include the file that sends the acceptance email

    echo "Applicant accepted successfully!";
} else {
    echo "User ID not provided.";
}
?>
