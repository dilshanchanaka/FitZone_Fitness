# 🏋️‍♂️ FitZone Fitness Center Website

A complete fitness center management system built using **PHP**, **MySQL**, **HTML**, and **CSS**, designed to run on **XAMPP**.  
This system allows members to register, book classes, and interact with the gym, while admins manage users, classes, and site content.

---

## 📌 Features

### 👤 Member Features
- Register and login with secure authentication
- View and book available classes
- Manage personal membership details
- Access member dashboard with class history
- Contact the gym via an online form

### 🛠️ Admin Features
- Manage users (add, edit, delete, view)
- Manage classes and schedules
- View booking history and statistics
- Manage blog posts and content
- View and reply to contact form messages

### 🎨 Design
- Modern responsive UI with CSS
- Separate dashboards for Admin and Members
- Organized folder structure with reusable PHP includes

---

## 📂 Project Structure
FitZone_Fitness/
├── index.html
├── login.php
├── signup.php
├── memberdashboard.php
├── maindashboard.php
├── admin/
│ ├── add-category.php
│ ├── add-package.php
│ ├── manage-post.php
│ └── ...other admin files
├── includes/
│ └── db.php
├── css/
│ └── style.css
├── images/
├── database/
│ ├── fitness_center.sql
│ └── gymdb.sql
└── README.md

markdown
---

## 🗄️ Database Setup

This project requires **two MySQL databases**.

1. Open **phpMyAdmin** from XAMPP (`http://localhost/phpmyadmin`).
2. Create the following databases:
   - `fitness_center`
   - `gymdb`
3. Import the SQL files from the `/database/` folder:
   - `fitness_center.sql` → into `fitness_center`
   - `gymdb.sql` → into `gymdb`
4. Update the file `includes/db.php` with your MySQL credentials:
   ```php
   $host = "localhost";
   $username = "root"; // default in XAMPP
   $password = ""; // default is empty
   $dbname = "fitness_center"; // update if needed
▶️ Run the Project
Start Apache and MySQL in XAMPP Control Panel.

Copy this project folder into:

makefile
Copy
Edit
C:\xampp\htdocs\gym
In your browser, go to:

arduino
Copy
Edit
http://localhost/gym/
👨‍💻 Technologies Used
Frontend: HTML5, CSS3, JavaScript

Backend: PHP 8+ (XAMPP)

Database: MySQL (via phpMyAdmin)

Server: Apache (XAMPP)

✍️ Author
Chanaka Dilshan Jayarathna
GitHub: dilshanchanaka
Email: chanakadilshan066@gmail.com


