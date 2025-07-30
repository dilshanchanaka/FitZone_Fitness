<?php
// Load Composer's autoloader if you installed PHPMailer with Composer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Include PHPMailer autoload file if using Composer

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.example.com'; // Replace with your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'your-email@example.com'; // Replace with your email address
        $mail->Password = 'your-email-password'; // Replace with your email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Email settings
        $mail->setFrom($email, $name);
        $mail->addAddress('your-email@example.com'); // Replace with recipient email address

        $mail->Subject = "New Contact Message from " . $name;
        $mail->Body    = "Name: $name\nEmail: $email\n\nMessage:\n$message";
        $mail->isHTML(false); // Set email format to plain text

        // Send email
        if ($mail->send()) {
            echo "<p>Message sent successfully!</p>";
        } else {
            echo "<p>Error sending message.</p>";
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Error: {$mail->ErrorInfo}";
    }
}
?>
