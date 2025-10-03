<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $category = htmlspecialchars($_POST['category']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    
    // Your email address where you want to receive feedback
    $to = "pawan.73719@gmail.com"; // CHANGE THIS TO YOUR ACTUAL EMAIL
    
    // Email subject
    $email_subject = "New Feedback: " . $subject;
    
    // Email content
    $email_body = "
    New feedback received from Mission Education Basic School website:
    
    Name: $name
    Email: $email
    Phone: $phone
    Category: $category
    Subject: $subject
    
    Message:
    $message
    
    ---
    This email was sent from the school website feedback form.
    ";
    
    // Email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    
    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        // Success response
        echo json_encode(['success' => true, 'message' => 'Thank you! Your feedback has been submitted successfully.']);
    } else {
        // Error response
        echo json_encode(['success' => false, 'message' => 'Sorry, there was an error submitting your feedback. Please try again.']);
    }
} else {
    // Not a POST request
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>