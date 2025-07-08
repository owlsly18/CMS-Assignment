<?php
header('Content-Type: application/json');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "../../vendor/autoload.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

$pdo = new PDO("mysql:host=localhost;dbname=eboutsource_db", "root", "");

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$number = trim($_POST['number'] ?? '');
$message = trim($_POST['message'] ?? '');

if (empty($name) || empty($email) || empty($message)) {
    echo json_encode(["success" => false, "message" => "All fields are required."]);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(["success" => false, "message" => "Invalid email address."]);
    exit;
}

$stmt = $pdo->prepare("INSERT INTO contacts (name, email, number, message) VALUES (?, ?, ?, ?)");
$mail= new PHPMailer(true);
if ($stmt->execute([$name, $email, $number, $message])) {
    $mail -> isSMTP();
    $mail -> Host= "smtp.gmail.com";
    $mail -> SMTPAuth= true;
    $mail -> Username= "myemail@gmail.com"; //replace with your username
    $mail -> Password= "mypa sswo rdmy pass"; //replace with your password
    $mail -> SMTPSecure= PHPMailer::ENCRYPTION_STARTTLS;
    $mail -> Port= 587;
    $mail -> setFrom("test@dsr.com", "DSR");
    // $mail -> addAddress("receiver.mail@gmail.com", "RECEIVER");
    $mail-> addAddress($email, $name); 
    $mail -> Subject = "Your message has been received.";
    $mail -> Body= "This is your copy of your message:\n Name: $name\nEmail: $email\nNumber: $number\nMessage:\n$message";
    if($mail -> send()){
        echo "<script>alert('Message sent successfully!');</script>";
    }else{
        echo "<script>alert('Message couldn\'t be sent. Error: " . addslashes($mail->ErrorInfo) . "');</script>";
    }
    // $to = $email;
    // $subject = "Your message has been received.";
    // $body = "This is your copy of your message:\n Name: $name\nEmail: $email\nNumber: $number\nMessage:\n$message";
    // $headers = "From: $email";
    // mail($to, $subject, $body, $headers);
    echo json_encode(["Your message has been sent successfully!"]);
} else {
    echo json_encode(["Failure to send message: Database error."]);
}
?>
