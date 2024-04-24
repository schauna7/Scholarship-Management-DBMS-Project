<?php
// Check if the success parameter is set
if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo "<p>Scholarship created successfully!</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholarship Website</title>
    <link rel="stylesheet" href="home.css"> <!-- Add your CSS file -->
</head>
<body>
    <header>
        <h1>Welcome to the Scholarship Website</h1>
    </header>
    <main>
        <section class="buttons-section">
            <a href="create_scholarship.php" class="btn-primary">Create Scholarship</a>
            <a href="view_scholarships.php" class="btn-secondary">View Scholarships</a>
        </section>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Scholarship Website. All rights reserved.</p>
        <a href="logout.php" class="btn-logout">Logout</a> <!-- Logout button -->
    </footer>
</body>
</html>
