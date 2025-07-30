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

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data and check if it's set
    $user = isset($_POST['username']) ? $_POST['username'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $pass = isset($_POST['password']) ? $_POST['password'] : '';
    $role = isset($_POST['role']) ? $_POST['role'] : 'member'; // Default to 'member'
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';

    // Validate required fields
    if (empty($user) || empty($email) || empty($pass) || empty($phone)) {
        echo "All fields are required!";
    } else {
        // Check if username already exists
        $sql = "SELECT * FROM users WHERE username = '$user'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "Username already taken. Please choose a different one.";
        } else {
            // Hash the password for security
            $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

            // Insert the new user into the database
            $insert_sql = "INSERT INTO users (username, password, email, role, phone) 
                           VALUES ('$user', '$hashed_password', '$email', '$role', '$phone')";
            if ($conn->query($insert_sql) === TRUE) {
                echo "Signup successful! Welcome to the fitness center.";
            } else {
                echo "Error: " . $insert_sql . "<br>" . $conn->error;
            }
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Signup Form</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      padding: 15px;
      background: #2A2E34;
      color: #fff;
      overflow: hidden;
    }
    .wrapper {
      max-width: 500px;
      width: 100%;
      background: #fff;
      border-radius: 5px;
      box-shadow: 0px 4px 10px 1px rgba(0, 0, 0, 0.7);
    }
    .wrapper .title {
      height: 120px;
      background: #F5B301;
      border-radius: 5px 5px 0 0;
      color: #2A2E34;
      font-size: 30px;
      font-weight: 600;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .wrapper form {
      padding: 25px 35px;
    }
    .wrapper form .row {
      height: 60px;
      margin-top: 15px;
      position: relative;
    }
    .wrapper form .row input,
    .wrapper form .row select {
      height: 100%;
      width: 100%;
      outline: none;
      padding-left: 70px;
      border-radius: 5px;
      border: 1px solid lightgrey;
      font-size: 18px;
      transition: all 0.3s ease;
    }
    form .row input:focus,
    form .row select:focus {
      border-color: #F5B301;
    }
    form .row input::placeholder {
      color: #999;
    }
    .wrapper form .row i {
      position: absolute;
      width: 55px;
      height: 100%;
      color: #fff;
      font-size: 22px;
      background: #F5B301;
      border: 1px solid #F5B301;
      border-radius: 5px 0 0 5px;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .wrapper form .button input {
      margin-top: 20px;
      color: #fff;
      font-size: 20px;
      font-weight: 500;
      padding-left: 0px;
      background: #F5B301;
      border: 1px solid #F5B301;
      cursor: pointer;
    }
    form .button input:hover {
      background: #e0a900;
    }
    .wrapper form .signup-link {
      text-align: center;
      margin-top: 45px;
      font-size: 17px;
    }
    .wrapper form .signup-link a {
      color: #F5B301;
      text-decoration: none;
    }
    form .signup-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <div class="title"><span>Signup Form</span></div>
    <form action="signup.php" method="POST">
      <div class="row">
        <i class="fas fa-user"></i>
        <input type="text" name="username" placeholder="Username" required />
      </div>
      <div class="row">
        <i class="fas fa-envelope"></i>
        <input type="email" name="email" placeholder="Email" required />
      </div>
      <div class="row">
        <i class="fas fa-lock"></i>
        <input type="password" name="password" placeholder="Password" required />
      </div>
      <div class="row">
        <i class="fas fa-users"></i>
        <select name="role" required>
          <option value="member">Member</option>
          <option value="admin">Admin</option>
        </select>
      </div>
      <div class="row">
        <i class="fas fa-phone"></i>
        <input type="text" name="phone" placeholder="Phone Number" required />
      </div>
      <div class="row button">
        <input type="submit" value="Signup" />
      </div>
      <div class="signup-link">Already a member? <a href="login1.php">Login now</a></div>
    </form>
  </div>
</body>
</html>
