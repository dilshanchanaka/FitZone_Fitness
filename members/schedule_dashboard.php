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
    <a href="index.php" class="home-button">Home</a>
<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fitness_center";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve member ID dynamically (e.g., from session)
$member_id = 1; // Example; replace with dynamic session data

// Fetch schedules for the logged-in member
$sql = "SELECT * FROM schedules WHERE member_id = $member_id ORDER BY schedule_date, start_time";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2A2E34;
            color: #fff;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #F5B301;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #F5B301;
            color: #2A2E34;
        }
        .add-schedule {
            margin-bottom: 20px;
        }
        .add-schedule form input, 
        .add-schedule form button {
            padding: 10px;
            margin-right: 10px;
        }
    </style>
</head>
<body>

    <h1>Schedule Dashboard</h1>
    

    <div class="add-schedule">
        <form action="add_schedule.php" method="POST">
            <input type="hidden" name="member_id" value="<?php echo $member_id; ?>">
            <input type="text" name="class_name" placeholder="Class Name" required>
            <input type="text" name="trainer_name" placeholder="Trainer Name" required>
            <input type="date" name="schedule_date" required>
            <input type="time" name="start_time" required>
            <input type="time" name="end_time" required>
            <button type="submit">Add Schedule</button>
        </form>
    </div>

    <h2>Your Schedules</h2>
    <table>
        <thead>
            <tr>
                <th>Class Name</th>
                <th>Trainer</th>
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['class_name']}</td>
                        <td>{$row['trainer_name']}</td>
                        <td>{$row['schedule_date']}</td>
                        <td>{$row['start_time']}</td>
                        <td>{$row['end_time']}</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No schedules found.</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>
<?php $conn->close(); ?>
