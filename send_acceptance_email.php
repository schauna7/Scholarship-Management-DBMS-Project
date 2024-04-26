<?php
// Include the PHPMailer library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPmailer.php'; // Adjust the path based on your project structure
require 'phpmailer/src/SMTP.php';

// Retrieve user ID from POST data
if(isset($_POST['user_id'])) {
    $userId = $_POST['user_id'];

    // Fetch user details from the database (assuming you have a users table)
    // Include the database connection file
    include "connection.php";

    // Query to fetch user details
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Email content
        $subject = "Your Scholarship Application has been Accepted!";
        $message = "Dear " . $user['username'] . ",\n\n";
        $message .= "We are pleased to inform you that your scholarship application has been accepted.";
        $message .= "Congratulations!\n\n";
        $message .= "Best regards,\nThe Scholarship Team";

        // Instantiate PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com'; // SMTP server
            $mail->SMTPAuth   = true;
            $mail->Username   = 'schauna2005@gmail.com'; // SMTP username
            $mail->Password   = 'fezb qfzf mhco ayqc';     // SMTP password
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            // Recipient
            $mail->setFrom('your@example.com', 'Your Name');
            $mail->addAddress($user['email'], $user['username']); // Add a recipient

            // Content
            $mail->isHTML(false); // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $message;

            // Send email
            $mail->send();
            echo 'Email sent successfully!';
        } catch (Exception $e) {
            echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "User not found.";
    }
} else {
    echo "User ID not provided.";
}
?>
