<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <style>
        .home-button {
            display: inline-block;
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
            margin-bottom: 20px;
        }
        .home-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <a href="index.html" class="home-button">Home</a>
<?php
// Database connection details
$servername = "localhost";
$username = "root"; // Replace with your DB username
$password = "";     // Replace with your DB password
$dbname = "fitness_center"; // Replace with your actual database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get member details (example: retrieving a member by ID)
$member_id = 1; // Replace with dynamic session or GET/POST variable
$sql = "SELECT * FROM members WHERE id = $member_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $member = $result->fetch_assoc();
} else {
    echo "No member found!";
    exit;
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Dashboard</title>
    
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }
        body {
            background-color: #2A2E34; /* Background color */
            color: #fff; /* Text color */
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .dashboard {
            width: 90%;
            max-width: 600px;
            background: #F5B301;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.7);
        }
        .dashboard img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 5px solid #2A2E34;
            margin-bottom: 20px;
        }
        .dashboard h2 {
            font-size: 2rem;
            margin-bottom: 10px;
        }
        .dashboard p {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }
        .dashboard .details {
            text-align: left;
            margin-top: 20px;
        }
        .details p {
            font-size: 1rem;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <img src="uploads/<?php echo $member['photo']; ?>" alt="Profile Picture">
        <h2><?php echo htmlspecialchars($member['name']); ?></h2>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($member['email']); ?></p>
        <p><strong>Phone:</strong> <?php echo htmlspecialchars($member['phone']); ?></p>
        <div class="details">
            <p><strong>Membership Type:</strong> <?php echo htmlspecialchars($member['membership_type']); ?></p>
            <p><strong>Joined Date:</strong> <?php echo htmlspecialchars($member['joined_date']); ?></p>
        </div>
    </div>
</body>
</html>
