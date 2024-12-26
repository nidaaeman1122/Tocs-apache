<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $suggestion = htmlspecialchars($_POST['suggestion']);

    // Save to a database or send an email (example below)
    $to = "nidaeman0987gmail.com"; // Replace with your email
    $subject = "New Suggestion from $name";
    $message = "Name: $name\nEmail: $email\nSuggestion:\n$suggestion";
    $headers = "From: $email";

    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you for your suggestion!";
    } else {
        echo "Failed to send your suggestion. Please try again.";
    }
}
?>
