<?php

// Only allow POST requests
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Invalid request.");
}

// Helper function to clean input
function clean($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

// Get form fields
$email    = filter_var($_POST["email"] ?? "", FILTER_VALIDATE_EMAIL);
$artist   = clean($_POST["artist"] ?? "");
$song     = clean($_POST["song"] ?? "");
$stream   = clean($_POST["stream"] ?? "");
$message  = clean($_POST["message"] ?? "");

// Required fields
if (!$artist || !$song || !$email) {
    die("Please fill out all required fields.");
}

// Build email
$body = <<<EOT
======================================
PROJECT RADIO MUSIC SUBMISSION
======================================

Contact Email:
$email

Artist:
$artist

Song:
$song

Streaming Link:
$stream

Track Information:
$message

======================================
Submitted on: {date('Y-m-d H:i:s')}
======================================
EOT;

// Replace the date placeholder
$body = str_replace("{date('Y-m-d H:i:s')}", date("Y-m-d H:i:s"), $body);

// Email headers
$headers = [
    "From: Project Radio <mooblast123@gmail.com>",
    "Reply-To: $email",
    "Content-Type: text/plain; charset=UTF-8"
];

// Send email
$mailSent = mail(
    "mooblast123@gmail.com",
    "New Music Submission - $artist - $song",
    $body,
    implode("\r\n", $headers)
);

// Redirect
if ($mailSent) {
    header("Location: thanks.html");
    exit;
} else {
    echo "<h2>Sorry!</h2>";
    echo "<p>There was a problem sending your submission. Please try again later.</p>";
}

?>