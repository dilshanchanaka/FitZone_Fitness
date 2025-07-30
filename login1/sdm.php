<?php
// Start the session to handle user login/logout
session_start();

// Placeholder for storing schedules (this should be handled by a database in a real app)
$schedules = isset($_SESSION['schedules']) ? $_SESSION['schedules'] : [];

// Handle new schedule submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_schedule'])) {
    // Collecting all form fields
    $new_schedule = [
        'schedule_id'   => count($schedules) + 1,  // Automatically increment schedule_id
        'trainer_name'  => htmlspecialchars($_POST['trainer_name']),
        'class_name'    => htmlspecialchars($_POST['class_name']),
        'date'          => htmlspecialchars($_POST['date']),
        'time'          => htmlspecialchars($_POST['time'])
    ];
    $schedules[] = $new_schedule;
    $_SESSION['schedules'] = $schedules;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Management Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgba(0, 0, 0, 0.7); /* Dark background with opacity */
            color: #fff; /* White text */
            margin: 0;
            padding: 0;
        }
        header {
            background-color: rgba(0, 0, 0, 0.7); /* Dark background for header */
            padding: 10px;
            text-align: center;
        }
        nav {
            background-color: rgba(0, 0, 0, 0.7); /* Dark background for navigation */
            padding: 10px;
            text-align: center;
        }
        nav a {
            color: #fff; /* White text for links */
            padding: 10px 15px;
            text-decoration: none;
            font-size: 16px;
        }
        nav a:hover {
            background-color: rgba(255, 255, 255, 0.2); /* Light hover effect */
        }
        h1 {
            margin: 0;
        }
        .container {
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.7); /* Dark background for content */
            border-radius: 8px;
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #fff; /* White borders for table */
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: rgba(0, 0, 0, 0.7); /* Dark background for table header */
        }
        form {
            margin: 20px 0;
        }
        form input[type="text"], form input[type="date"], form input[type="time"] {
            padding: 10px;
            width: calc(100% - 22px);
            margin-bottom: 10px;
            border: 1px solid #fff; /* White border for form inputs */
            background-color: rgba(255, 255, 255, 0.2); /* Slightly transparent background */
            color: #fff; /* White text */
        }
        form button {
            padding: 10px 20px;
            background-color: rgba(0, 0, 0, 0.7); /* Dark background for button */
            border: none;
            color: white;
            cursor: pointer;
        }
        form button:hover {
            background-color: rgba(255, 255, 255, 0.2); /* Light hover effect */
        }
    </style>
</head>
<body>
    <header>
        <h1>Schedule Management Dashboard</h1>
    </header>

    <!-- Navigation Bar (Login/Logout) -->
    <nav>
        <?php if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in']): ?>
            <!-- If logged in, display Logout button -->
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <!-- If not logged in, display Login button -->
            <a href="login.php">Login</a>
        <?php endif; ?>
    </nav>

    <div class="container">
        <h2>Class Schedule List</h2>
        <table>
            <thead>
                <tr>
                    <th>Schedule ID</th>
                    <th>Trainer Name</th>
                    <th>Class Name</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($schedules)): ?>
                    <?php foreach ($schedules as $schedule): ?>
                        <tr>
                            <td><?php echo $schedule['schedule_id']; ?></td>
                            <td><?php echo $schedule['trainer_name']; ?></td>
                            <td><?php echo $schedule['class_name']; ?></td>
                            <td><?php echo $schedule['date']; ?></td>
                            <td><?php echo $schedule['time']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No schedules found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <h2>Add New Schedule</h2>
        <form method="POST" action="">
            <input type="text" name="trainer_name" placeholder="Enter Trainer Name" required>
            <input type="text" name="class_name" placeholder="Enter Class Name" required>
            <input type="date" name="date" required>
            <input type="time" name="time" required>

            <button type="submit" name="add_schedule">Add Schedule</button>
        </form>
    </div>
</body>
</html>
