<?php
session_start(); // Start session to access session variables

// Check if user is already logged in
if(isset($_SESSION['username'])){
    header("Location: home.php"); // Redirect to home page if logged in
    exit(); // Ensure script stops execution after redirection
}

// Include database connection file
include("connection.php");

// Check if form is submitted
if(isset($_POST['submit'])){
    // Escape all inputs to prevent SQL injection
    $username = mysqli_real_escape_string($conn, $_POST['user']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpass']);
    // Additional fields
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $caste = mysqli_real_escape_string($conn, $_POST['caste']);
    $tenth_score = mysqli_real_escape_string($conn, $_POST['tenth_score']);
    $twelfth_score = mysqli_real_escape_string($conn, $_POST['twelfth_score']);
    $annual_income = mysqli_real_escape_string($conn, $_POST['annual_income']);
    $nationality = mysqli_real_escape_string($conn, $_POST['nationality']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);

    // Check if username or email already exists
    $sql="SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    $count_user = mysqli_num_rows($result);

    $sql="SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $count_email = mysqli_num_rows($result);

    // If username and email are unique
    if($count_user == 0 && $count_email == 0){
        // Check if passwords match
        if($password == $cpassword){
            
            // Hash the password
            $hash = password_hash($password, PASSWORD_DEFAULT);
            // Insert user data into the database
            $sql = "INSERT INTO users(username, email, password, dob, state, caste, tenth_score, twelfth_score, annual_income, nationality, gender) 
                    VALUES('$username', '$email', '$hash', '$dob', '$state', '$caste', '$tenth_score', '$twelfth_score', '$annual_income', '$nationality', '$gender')";
            $result = mysqli_query($conn, $sql);
            if($result){
                // Redirect to login page upon successful registration
                header("Location: student_login.php");
                exit(); // Ensure that script stops execution after redirection
            } else {
                // Error handling if insertion fails
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            // Passwords don't match
            echo '<script>
                alert("Passwords do not match");
                window.location.href = "student_signup.php";
            </script>';
        }
    } else {
        // Username or email already exists
        echo '<script>
            window.location.href="student_signup.php";
            alert("Username or email already exists!!");
        </script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"> <!-- Include your custom stylesheet -->
</head>
<body>
    <div id="form">
        <h1 id="heading">Student Sign Up Form</h1><br>
        <form name="form" action="student_signup.php" method="POST">
            <label>Enter Username: </label>
            <input type="text" id="user" name="user" required><br><br>
            <label>Enter Email: </label>
            <input type="email" id="email" name="email" required><br><br>
            <label>Enter Date of Birth: </label>
            <input type="date" id="dob" name="dob" required><br><br>
            <label>Select State: </label>
            <select id="state" name="state" required>
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
        
                <!-- Add more options as needed -->
            
                <label for="caste">Caste:</label><br>
        <select id="caste" name="caste" required>
            <option value="General">General</option>
            <option value="SC/ST">SC/ST</option>
            <option value="EWS">EWS</option>
            <option value="OBC">OBC</option>
            <option value="Physically Challenged">Physically Challenged</option>
            
            <!-- Add more caste options as needed -->
        </select><br><br>
            <label>Enter Tenth Score: </label>
            <input type="text" id="tenth_score" name="tenth_score" required><br><br>
            <label>Enter Twelfth Score: </label>
            <input type="text" id="twelfth_score" name="twelfth_score" required><br><br>
            <label>Enter Annual Income: </label>
            <input type="text" id="annual_income" name="annual_income" required><br><br>
            <label>Enter Nationality: </label>
            <label>Select Nationality: </label>
            <select id="nationality" name="nationality" required>
                <option value="Indian">Indian</option>
                <option value="Others">Others</option>
                <!-- Add more options as needed -->
            </select><br><br>
            <label>Select Gender: </label><br>
            <input type="radio" id="male" name="gender" value="Male" required>
            <label for="male">Male</label><br>
            <input type="radio" id="female" name="gender" value="Female" required>
            <label for="female">Female</label><br>
            <!-- Add more options as needed -->
            <br>
            <label>Create Password: </label>
            <input type="password" id="pass" name="pass" required><br><br>
            <label>Retype Password: </label>
            <input type="password" id="cpass" name="cpass" required><br><br>
            <input type="submit" id="btn" value="Sign Up" name="submit"/>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
