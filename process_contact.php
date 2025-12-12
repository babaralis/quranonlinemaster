<?php
// Contact Form Processing Script
require_once 'includes/config.php';

// Set JSON response header
header('Content-Type: application/json');

// Initialize response array
$response = [
    'success' => false,
    'message' => '',
    'errors' => []
];

// Check if form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Get and sanitize form data
    $fullName = isset($_POST['fullName']) ? sanitizeInput($_POST['fullName']) : null;
    $email = isset($_POST['emailAddress']) ? sanitizeInput($_POST['emailAddress']) : null;
    $prefCourse = isset($_POST['prefCourse']) ? sanitizeInput($_POST['prefCourse']) : null;
    $prefDays = isset($_POST['prefDays']) ? sanitizeInput($_POST['prefDays']) : null;
    $extraDetails = isset($_POST['extraDetails']) ? sanitizeInput($_POST['extraDetails']) : null;
    
    // Basic validation (optional - since all fields are nullable)
    $isValid = true;
    
    // Optional: Add validation if you want certain fields to be required
    if (empty($email)) {
        $response['errors']['email'] = 'Email address is required';
        $isValid = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['errors']['email'] = 'Please enter a valid email address';
        $isValid = false;
    }
    
    if (empty($fullName)) {
        $response['errors']['fullName'] = 'Full name is required';
        $isValid = false;
    }
    
    if ($isValid) {
        // Get database connection
        $conn = getDatabaseConnection();
        
        if ($conn) {
            // Prepare SQL statement
            $stmt = $conn->prepare("INSERT INTO contact_submissions 
                (full_name, email, preferred_course, preferred_days, additional_details, ip_address) 
                VALUES (?, ?, ?, ?, ?, ?)");
            
            if ($stmt) {
                // Get client IP
                $ipAddress = getClientIP();
                
                // Bind parameters (all nullable)
                $stmt->bind_param("ssssss", 
                    $fullName, 
                    $email, 
                    $prefCourse, 
                    $prefDays, 
                    $extraDetails, 
                    $ipAddress
                );
                
                // Execute statement
                if ($stmt->execute()) {
                    $response['success'] = true;
                    $response['message'] = 'Thank you for your inquiry! We will contact you within 24 hours, in shaa Allah.';
                    
                    // Optional: Send email notification
                    // sendEmailNotification($fullName, $email, $prefCourse);
                    
                } else {
                    $response['message'] = 'Sorry, there was an error submitting your request. Please try again.';
                    error_log("Database Insert Error: " . $stmt->error);
                }
                
                $stmt->close();
            } else {
                $response['message'] = 'Database error. Please try again later.';
                error_log("Statement Preparation Error: " . $conn->error);
            }
            
            $conn->close();
        } else {
            $response['message'] = 'Unable to connect to database. Please try again later.';
        }
    } else {
        $response['message'] = 'Please correct the errors in the form.';
    }
    
} else {
    $response['message'] = 'Invalid request method.';
}

// Return JSON response
echo json_encode($response);

// Optional: Email notification function
function sendEmailNotification($name, $email, $course) {
    $to = "support@quranacademy.live"; // Your email
    $subject = "New Contact Form Submission - Quran Academy Online";
    $message = "
    <html>
    <head>
        <title>New Contact Form Submission</title>
    </head>
    <body>
        <h2>New Contact Form Submission</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Preferred Course:</strong> $course</p>
        <p>Please check the admin panel for full details.</p>
    </body>
    </html>
    ";
    
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: noreply@quranacademy.live" . "\r\n";
    
    mail($to, $subject, $message, $headers);
}
?>

