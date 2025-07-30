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
    <a href="gym/members/index.html" class="home-button">Home</a>
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
$member_id = 1; // Example for testing; replace with dynamic ID

// Fetch payments for the logged-in member
$sql = "SELECT * FROM payments WHERE member_id = $member_id ORDER BY payment_date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #2A2E34;
            color: #fff;
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
        .add-payment {
            margin-bottom: 20px;
        }
        .add-payment form input, .add-payment form select, .add-payment form button {
            padding: 10px;
            margin-right: 10px;
        }
    </style>
</head>
<body>

    <h1>Payment Dashboard</h1>

    <div class="add-payment">
        <form action="add_payment.php" method="POST">
            <input type="hidden" name="member_id" value="<?php echo $member_id; ?>">
            <input type="date" name="payment_date" required>
            <input type="number" name="amount" placeholder="Amount" step="0.01" required>
            <select name="payment_method" required>
                <option value="Credit Card">Credit Card</option>
                <option value="Bank Transfer">Bank Transfer</option>
                <option value="Cash">Cash</option>
            </select>
            <button type="submit">Add Payment</button>
        </form>
    </div>

    <h2>Payment History</h2>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Amount</th>
                <th>Method</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['payment_date']}</td>
                        <td>{$row['amount']}</td>
                        <td>{$row['payment_method']}</td>
                        <td>{$row['status']}</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No payments found.</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>
<?php $conn->close(); ?>
