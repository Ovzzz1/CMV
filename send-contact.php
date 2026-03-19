<?php
/**
 * send-contact.php
 * Handles contact form submissions from the homepage banner.
 * Sends email to expertise-renov@protonmail.com and redirects back.
 */
require_once 'functions.php';

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ' . BASE_URL);
    exit;
}

// Honeypot anti-spam check
if (!empty($_POST['website'])) {
    header('Location: ' . BASE_URL);
    exit;
}

// Sanitize inputs
$email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
$message = trim($_POST['message'] ?? '');

// Validate
if (!filter_var($email, FILTER_VALIDATE_EMAIL) || empty($message)) {
    header('Location: ' . BASE_URL . '?contact=error#contact-banner');
    exit;
}

// Prepare email
$to = 'expertise-renov@protonmail.com';
$subject = 'Nouveau message via Expert Renov\' - Contact Homepage';
$body = "Nouveau message reçu via le formulaire de contact Expert Renov'.\n\n";
$body .= "Expéditeur : " . $email . "\n\n";
$body .= "Message :\n" . $message . "\n";

$headers = "From: noreply@expert-renov.fr\r\n";
$headers .= "Reply-To: " . $email . "\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// Send
$sent = mail($to, $subject, $body, $headers);

if ($sent) {
    header('Location: ' . BASE_URL . '?contact=ok#contact-banner');
}
else {
    header('Location: ' . BASE_URL . '?contact=error#contact-banner');
}
exit;
