<?php
    session_start();
    if(isset($_SESSION['username'])){
        header("Location: home.php");
        exit(); // Ensure that script stops execution after redirection
    }
?>
<?php
    $login = false;
    include('connection.php');
    if (isset($_POST['submit'])) {
        $username = $_POST['user'];
        $password = $_POST['pass'];

        $sql = "SELECT * FROM users WHERE username = '$username' OR email = '$username'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        
        if($row){  
            if(password_verify($password, $row["password"])){
                $login=true;
                session_start();

                $_SESSION['username'] = $row['username'];
                $_SESSION['loggedin'] = true;
                header("Location: student_home.php"); // Redirect to student home page
                exit(); // Ensure that script stops execution after redirection
            }
        }  
        else{  
            echo  '<script>
                        alert("Login failed. Invalid username or password!!");
                        window.location.href = "student_login.php";
                    </script>';
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
