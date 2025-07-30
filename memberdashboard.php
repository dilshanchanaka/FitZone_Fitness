<?php
session_start();

// Check if the user is logged in (this can be improved by using session variables)
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'member') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            text-align: center;
            padding: 50px;
        }
        h1 {
            color: #1abc9c;
        }
        .nav-links a {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            background-color: #1abc9c;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .nav-links a:hover {
            background-color: #12876f;
        }
    </style>
</head>
<body>
    <h1>Welcome to the Member Dashboard</h1>
    <p>Hello, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>

    <div class="nav-links">
        <a href="view_classes.php">View Classes</a>
        <a href="profile.php">View Profile</a>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
