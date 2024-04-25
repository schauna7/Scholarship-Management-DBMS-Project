<?php
    session_start();
    // Redirect if user is already logged in
    if(isset($_SESSION['username'])){
        header("Location: home.php");
        exit(); // Ensure that script stops execution after redirection
    }
    
    include('connection.php');
    $login = false;

    if (isset($_POST['submit'])) {
        $username = $_POST['user'];
        $password = $_POST['pass'];

        $sql = "SELECT id, username, password FROM users WHERE username = ? OR email = ?";  
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();

        if($row && password_verify($password, $row["password"])){
            $login=true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['loggedin'] = true;
            // Set the student ID session variable
            $_SESSION['student_id'] = $row['id'];
            header("Location: student_home.php"); // Redirect to student home page
            exit(); // Ensure that script stops execution after redirection
        } else {
            $error = "Login failed. Invalid username or password!!";
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <br><br>
    <div id="form">
        <h1 id="heading">Login Form</h1>
        <form name="form" action="student_login.php" method="POST" onsubmit="return isValid()">
            <?php if(isset($error)): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            <label>Enter Username/Email: </label>
            <input type="text" id="user" name="user"></br></br>
            <label>Password: </label>
            <input type="password" id="pass" name="pass" required></br></br>
            <input type="submit" id="btn" value="Login" name="submit"/>
        </form>
    </div>
    <script>
        function isValid() {
            var user = document.form.user.value;
            if(user.length == "") {
                alert("Enter username or email id!");
                return false;
            }
        }
    </script>
</body>
</html>
