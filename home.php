<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholarship Website</title>
    <link rel="stylesheet" href="home.css"> <!-- Add your CSS file -->
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

        /* Add space for the image */
        .company-logo {
            text-align: center;
            margin-top: 0px;
        }
        
        .company-logo img {
            max-width: 1000px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to the Scholarship Website</h1>
    </header>
    <!-- Navbar -->
    <div class="navbar">
        <a href="home.php" class="active">Home</a>
        <a href="create_scholarship.php">Create Scholarship</a>
        <a href="view_scholarships.php">View Scholarships</a>
        <a href="logout.php" style="float:right">Logout</a>
    </div>
    <!-- Company Logo -->
    <div class="company-logo">
        <img src="company.avif" alt="Company Logo">
    </div>
    <main>
        <!-- Your main content here -->
        <section class="buttons-section">
            <!-- Your buttons section -->
            <?php
            // Check if the success parameter is set
            if (isset($_GET['success']) && $_GET['success'] == 1) {
                echo "<p>Scholarship created successfully!</p>";
            }
            ?>
        </section>
    </main>

</body>
</html>