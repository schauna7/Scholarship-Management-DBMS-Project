<?php
// Include the database connection file
include "connection.php";

// Check if scholarship ID is provided in the URL
if(isset($_GET['id'])) {
    $scholarship_id = $_GET['id'];

    // SQL query to retrieve scholarship details based on ID
    $sql_select = "SELECT * FROM scholarship WHERE scholarship_id = '$scholarship_id'";

    // Execute the query
    $result = mysqli_query($conn, $sql_select);

    // Check if scholarship exists
    if (mysqli_num_rows($result) == 1) {
        // Fetch scholarship details
        $row = mysqli_fetch_assoc($result);

        // Display confirmation message
        echo "Are you sure you want to delete the scholarship '{$row['scholarship_name']}'?";
        echo '<form action="" method="post">';
        echo '<input type="submit" name="confirm" value="Yes">';
        echo '<input type="submit" name="cancel" value="No">';
        echo '</form>';

        if(isset($_POST['confirm'])) {
            // Insert scholarship details into the backup table
            $sql_backup = "INSERT INTO scholarship_backup (scholarship_id, company_id, scholarship_name, caste, state, gender, tenth_score, twelfth_score, nationality, annual_income, grant_amount, scholarship_description) 
                           VALUES ('{$row['scholarship_id']}', '{$row['company_id']}', '{$row['scholarship_name']}', '{$row['caste']}', '{$row['state']}', '{$row['gender']}', '{$row['tenth_score']}', '{$row['twelfth_score']}', '{$row['nationality']}', '{$row['annual_income']}', '{$row['grant_amount']}', '{$row['scholarship_description']}')";

            // Execute the backup query
            if (mysqli_query($conn, $sql_backup)) {
                // Delete the scholarship from the main table
                $sql_delete = "DELETE FROM scholarship WHERE scholarship_id = '$scholarship_id'";
                if (mysqli_query($conn, $sql_delete)) {
                    echo "Scholarship '{$row['scholarship_name']}' deleted successfully!";
                } else {
                    echo "Error deleting scholarship: " . mysqli_error($conn);
                }
            } else {
                echo "Error backing up scholarship: " . mysqli_error($conn);
            }
        } elseif(isset($_POST['cancel'])) {
            echo "Deletion cancelled.";
        }
    } else {
        echo "Scholarship not found.";
    }
} else {
    echo "Scholarship ID not provided.";
}

// Close the database connection
mysqli_close($conn);
?>
