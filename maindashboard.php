<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Dashboard</title>
    <style>
        /* Apply global styles */
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
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        header {
            background-color: #F5B301; /* Accent color */
            width: 100%;
            padding: 15px 0;
            text-align: center;
        }

        header .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        header h1 {
            font-size: 2rem;
            color: #2A2E34; /* Contrast with accent background */
        }

        nav ul {
            list-style: none;
            margin-top: 15px;
            display: flex;
            justify-content: center;
            padding: 0;
        }

        nav ul li {
            margin: 0 10px;
        }

        nav ul li a {
            text-decoration: none;
            color: #2A2E34; /* Text color matching background */
            font-weight: 600;
            padding: 10px 20px;
            background-color: #fff; /* Button-like appearance */
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        nav ul li a:hover {
            background-color: #F5B301; /* Match accent color on hover */
            color: #fff; /* Contrast text color */
        }
    </style>
</head>
<body>

    <header>
        <div class="container">
            <h1>Main Dashboard</h1>
            <nav>
                <ul>
                    <li><a href="members/member_dashboard.php">Dashboard</a></li>
                    <li><a href="members/payment_dashboard.php">payments</a></li>
                    <li><a href="members/schedule_dashboard.php">Schedule Manager</a></li>
                    <li><a href="index.html">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>

</body>
</html>
