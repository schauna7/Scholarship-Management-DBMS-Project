<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Scholarships</title>
    <link rel="stylesheet" type="text/css" href="view.css">
    <style>
       /* Navbar styles */
    .navbar {
        background-color: #4E6479;
        overflow: hidden;
    }

    .navbar a {
        float: left;
        display: block;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 20px;
        text-decoration: none;
    }

    .navbar a:hover {
        background-color: #ddd;
        color: black;
    }

    .navbar a.active {
        background-color: #4CAF50;
        color: white;
    }
    </style>
    <style>
        .scholarship-box {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
        }
        .buttons {
            margin-top: 10px;
        }
        .buttons button {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <h2>View Scholarships</h2>
    <?php
    // Include the database connection file
    include "connection.php";

    // Start the session to get the logged-in company's email
    session_start();
    $company_email = $_SESSION['email'];

    // SQL query to retrieve scholarships created by the logged-in company
    $sql = "SELECT scholarship_id, scholarship_name, scholarship_description, grant_amount FROM scholarship WHERE company_id = '$company_email'";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if there are scholarships
    if (mysqli_num_rows($result) > 0) {
        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="scholarship-box">';
            echo "<strong>Scholarship Name:</strong> " . $row["scholarship_name"] . "<br>";
            echo "<strong>Scholarship Description:</strong> " . $row["scholarship_description"] . "<br>";
            echo "<strong>Grant Amount:</strong> $" . $row["grant_amount"] . "<br>";

            // Update and delete buttons
            echo '<div class="buttons">';
            echo '<a href="update_scholarship.php?id=' . $row["scholarship_id"] . '"><button>Update</button></a>';
            echo '<a href="delete_scholarship.php?id=' . $row["scholarship_id"] . '"><button>Delete</button></a>';
            echo '</div>';

             // View Applicants button
             echo '<div class="buttons">';
             echo '<a href="view_applicants.php?scholarship_id=' . $row["scholarship_id"] . '"><button>View Applicants</button></a>';
             echo '</div>';
 
            echo '</div>'; // End of scholarship-box
        }
    } else {
        echo "No scholarships found.";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
</body>
</html>
