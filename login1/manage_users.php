<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management Dashboard</title>
    <link rel="stylesheet" href="UserManagementDashboard.css"> <!-- Link to the external CSS file -->
</head>
<body>

    <header>
        <div class="container">
            <h1>User Management Dashboard</h1>
            <nav>
                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="sdm.php">Schedule Management</a></li>
                    <li><a href="manage_users.php">Manage Users</a></li>
                    <li><a href="settings.php">Settings</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container">
        <div class="welcome">
            <h2>Welcome, Admin</h2>
            <p>Manage your users from here. You can add, edit, or delete user accounts.</p>
        </div>

        <div class="user-list">
            <h2>All Users</h2>
            <table>
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>John Doe</td>
                        <td>john@example.com</td>
                        <td>Member</td>
                        <td class="actions">
                            <a href="edit_user.php?id=1" class="btn-edit">Edit</a>
                            <a href="delete_user.php?id=1" class="btn-delete">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Jane Smith</td>
                        <td>jane@example.com</td>
                        <td>Admin</td>
                        <td class="actions">
                            <a href="edit_user.php?id=2" class="btn-edit">Edit</a>
                            <a href="delete_user.php?id=2" class="btn-delete">Delete</a>
                        </td>
                    </tr>
                    <!-- Add more rows dynamically -->
                </tbody>
            </table>
        </div>

        <div class="add-user">
            <h2>Add New User</h2>
            <form action="add_user.php" method="POST">
                <input type="text" name="first_name" placeholder="Enter First Name" required>
                <input type="text" name="last_name" placeholder="Enter Last Name" required>
                <input type="email" name="email" placeholder="Enter Email" required>
                <input type="password" name="password" placeholder="Enter Password" required>
                <select name="role" required>
                    <option value="Member">Member</option>
                    <option value="Admin">Admin</option>
                </select>
                <button type="submit" class="btn-submit">Add User</button>
            </form>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Your Company Name | All Rights Reserved</p>
    </footer>

</body>
</html>
