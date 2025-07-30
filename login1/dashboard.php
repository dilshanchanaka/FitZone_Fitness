<?php
// Start the session to handle user login/logout
session_start();

// Placeholder for adding new members (in a real app, this should connect to a database)
$members = isset($_SESSION['members']) ? $_SESSION['members'] : [];

// Handle new member submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_member'])) {
    // Collecting all form fields
    $new_member = [
        'member_id'   => count($members) + 1,  // Automatically increment member_id
        'first_name'  => htmlspecialchars($_POST['first_name']),
        'last_name'   => htmlspecialchars($_POST['last_name']),
        'email'       => htmlspecialchars($_POST['email']),
        'contact'     => htmlspecialchars($_POST['contact']),
        'trainer_id'  => htmlspecialchars($_POST['trainer_id'])  // Assuming trainer_id comes from a predefined list
    ];
    $members[] = $new_member;
    $_SESSION['members'] = $members;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
        form input[type="text"] {
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
        <h1>Dashboard</h1>
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
        <h2>Member List</h2>
        <table>
            <thead>
                <tr>
                    <th>Member ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Trainer ID</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($members)): ?>
                    <?php foreach ($members as $member): ?>
                        <tr>
                            <td><?php echo $member['member_id']; ?></td>
                            <td><?php echo $member['first_name']; ?></td>
                            <td><?php echo $member['last_name']; ?></td>
                            <td><?php echo $member['email']; ?></td>
                            <td><?php echo $member['contact']; ?></td>
                            <td><?php echo $member['trainer_id']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">No members found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <h2>Add New Member</h2>
        <form method="POST" action="">
            <input type="text" name="first_name" placeholder="Enter First Name" required>
            <input type="text" name="last_name" placeholder="Enter Last Name" required>
            <input type="text" name="email" placeholder="Enter Email" required>
            <input type="text" name="contact" placeholder="Enter Contact" required>
            <input type="text" name="trainer_id" placeholder="Enter Trainer ID" required>

            <button type="submit" name="add_member">Add Member</button>
        </form>
    </div>
</body>
</html>
