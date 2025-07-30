<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $fullName = htmlspecialchars($_POST['fullName']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $membershipPlan = htmlspecialchars($_POST['membershipPlan']);
    $startDate = htmlspecialchars($_POST['startDate']);

    // Example email confirmation (optional)
    $to = $email;
    $subject = "FitZone Membership Registration Confirmation";
    $message = "Hello $fullName,\n\nThank you for registering for the $membershipPlan at FitZone Fitness Center.\n" .
               "Start Date: $startDate\n\nWe look forward to seeing you at the gym!";
    $headers = "From: no-reply@fitzone.com";

    // Uncomment to send email (if mail server is set up)
    // mail($to, $subject, $message, $headers);

    // Display confirmation message
    echo "<h1>Thank you, $fullName!</h1>";
    echo "<p>Your registration for the $membershipPlan has been received. We'll contact you at $email.</p>";
} else {
    echo "<p>There was an error with your registration. Please try again.</p>";
}
?>
