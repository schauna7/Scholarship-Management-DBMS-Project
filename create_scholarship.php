<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Scholarship</title>
</head>
<body>
    <h2>Create Scholarship</h2>
    <form action="create_scholarship_process.php" method="post">
        <label for="scholarship_name">Scholarship Name:</label><br>
        <input type="text" id="scholarship_name" name="scholarship_name" required><br><br>
        
        <label for="state">State:</label><br>
        <input type="text" id="state" name="state" required><br><br>
        
        <label for="caste">Caste:</label><br>
        <input type="text" id="caste" name="caste" required><br><br>
        
        <label for="gender">Gender:</label><br>
        <select id="gender" name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select><br><br>
        
        <label for="tenth_score">10th Score:</label><br>
        <input type="number" id="tenth_score" name="tenth_score" required><br><br>
        
        <label for="twelfth_score">12th Score:</label><br>
        <input type="number" id="twelfth_score" name="twelfth_score" required><br><br>
        
        <label for="nationality">Nationality:</label><br>
        <input type="text" id="nationality" name="nationality" required><br><br>
        
        <label for="annual_income">Annual Income:</label><br>
        <input type="number" id="annual_income" name="annual_income" required><br><br>
        
        <label for="grant_amount">Grant Amount:</label><br>
        <input type="number" id="grant_amount" name="grant_amount" required><br><br>
        
        <label for="scholarship_description">Scholarship Description:</label><br>
        <textarea id="scholarship_description" name="scholarship_description" rows="4" cols="50" required></textarea><br><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>
