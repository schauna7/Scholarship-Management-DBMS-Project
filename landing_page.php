<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Scholarship Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-image: url('scholarship-graduation-cap-on-money-260nw-767158405.webp'); /* Background image */
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            text-align: center;
            background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent white background */
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Soft shadow effect */
        }
        h1 {
            font-size: 36px;
            color: #333;
            margin-bottom: 20px;
        }
        p {
            font-size: 18px;
            color: #666;
            margin-bottom: 40px;
        }
        .options {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .btn {
            padding: 12px 24px;
            font-size: 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .btn.company {
            background-color: #007bff;
            color: #fff;
        }
        .btn.company:hover {
            background-color: #0056b3;
        }
        .btn.student {
            background-color: #28a745;
            color: #fff;
        }
        .btn.student:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Scholarship Portal</h1>
        <p>Explore opportunities for students and companies</p>
        <div class="options">
            <a href="landing_company.php" class="btn btn-lg company">Join as Company</a>
            <a href="index.php" class="btn btn-lg student">Join as Student</a>
        </div>
    </div>
</body>
</html>