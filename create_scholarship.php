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
        <select id="state" name="state" required>
            <option value="All">All</option>
            <option value="AP">Andhra Pradesh</option>
	<option value="AR">Arunachal Pradesh</option>
	<option value="AS">Assam</option>
	<option value="BR">Bihar</option>
	<option value="CT">Chhattisgarh</option>
	<option value="GA">Gujarat</option>
	<option value="HR">Haryana</option>
	<option value="HP">Himachal Pradesh</option>
	<option value="JK">Jammu and Kashmir</option>
	<option value="GA">Goa</option>
	<option value="JH">Jharkhand</option>
	<option value="KA">Karnataka</option>
	<option value="KL">Kerala</option>
	<option value="MP">Madhya Pradesh</option>
	<option value="MH">Maharashtra</option>
        <option value="MN">Manipur</option>
        <option value="ML">Meghalaya</option>
	<option value="MZ">Mizoram</option>
	<option value="NL">Nagaland</option>
	<option value="OR">Odisha</option>
	<option value="PB">Punjab</option>
	<option value="RJ">Rajasthan</option>
	<option value="SK">Sikkim</option>
	<option value="TN">Tamil Nadu</option>
	<option value="TG">Telangana</option>
	<option value="TR">Tripura</option>
	<option value="UT">Uttarakhand</option>
	<option value="UP">Uttar Pradesh</option>
	<option value="WB">West Bengal</option>
	<option value="AN">Andaman and Nicobar Islands</option>
	<option value="CH">Chandigarh</option>
	<option value="DN">Dadra and Nagar Haveli</option>
	<option value="DD">Daman and Diu</option>
	<option value="DL">Delhi</option>
	<option value="LD">Lakshadweep</option>
	<option value="PY">Puducherry</option>
        </select><br><br>
        
        <label for="caste">Caste:</label><br>
        <select id="caste" name="caste" required>
            <option value="General">General</option>
            <option value="SC/ST">SC/ST</option>
            <option value="EWS">EWS</option>
            <option value="Physically Challenged">Physically Challenged</option>
            <!-- Add more caste options as needed -->
        </select><br><br>
        
        <label for="gender">Gender:</label><br>
        <select id="gender" name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Both">Both</option>
        </select><br><br>
        
        <label for="tenth_score">10th Score:</label><br>
        <input type="number" id="tenth_score" name="tenth_score"><br><br>
        
        <label for="twelfth_score">12th Score:</label><br>
        <input type="number" id="twelfth_score" name="twelfth_score"><br><br>
        
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
