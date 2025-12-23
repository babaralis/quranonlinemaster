<?php
require __DIR__ . '/vendor/autoload.php'; // adjust path if manual install
// Contact Form Submission Handler
header('Content-Type: application/json');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Allow only POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        'success'  => false,
        'message' => 'Invalid request method.'
    ]);
    exit;
}

/**
 * Simple helper to sanitize/trim input
 */
function clean($key) {
    return isset($_POST[$key]) ? trim(htmlspecialchars($_POST[$key], ENT_QUOTES, 'UTF-8')) : '';
}

// Get form data - matching contact.php field names
$full_name     = clean('fullName');
$email         = clean('emailAddress');
$prefCourse    = clean('prefCourse');
$prefDays      = clean('prefDays');
$extraDetails  = clean('extraDetails');

// Get client IP
$ip_address = $_SERVER['REMOTE_ADDR'] ?? 'Unknown';
if (isset($_SERVER['HTTP_CLIENT_IP'])) {
    $ip_address = $_SERVER['HTTP_CLIENT_IP'];
} elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
}

// Basic server-side validation
if ($full_name === '' || $email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode([
        'success'  => false,
        'message' => 'Please fill in all required fields with valid information.'
    ]);
    exit;
}

/**
 * DATABASE CONNECTION
 * Live Server Configuration
 */

$host = 'localhost';
$db   = 'quranonlinemaste_db';
$user = 'quranonlinemaste_user';
$pass = 'sleekhive@786';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ]);
} catch (PDOException $e) {
    error_log("Database connection failed: " . $e->getMessage());
    echo json_encode([
        'success'  => false,
        'message' => 'Database connection failed. Please try again later.'
    ]);
    exit;
}

// INSERT into DB - matching contact_submissions table structure
try {
    $stmt = $pdo->prepare("
        INSERT INTO contact_submissions
            (full_name, email, preferred_course, preferred_days, additional_details, ip_address, submission_date)
        VALUES
            (:full_name, :email, :preferred_course, :preferred_days, :additional_details, :ip_address, NOW())
    ");

    $stmt->execute([
        ':full_name'          => $full_name,
        ':email'              => $email,
        ':preferred_course'   => $prefCourse,
        ':preferred_days'     => $prefDays,
        ':additional_details' => $extraDetails,
        ':ip_address'         => $ip_address
    ]);
    
    $inserted_id = $pdo->lastInsertId();
    
} catch (PDOException $e) {
    error_log("Database insert error: " . $e->getMessage());
    echo json_encode([
        'success'  => false,
        'message' => 'Unable to save your details at the moment. Please try again.'
    ]);
    exit;
}

/**
 * SEND EMAIL NOTIFICATION
 */
// $to      = 'info@quranmasteronline.com'; // Change to your email
// $subject = 'New Student Inquiry - Quran Master Online';
// $headers = "From: Quran Master Online <noreply@quranonlinemaster.com>\r\n";
// $headers .= "Cc: qmoleads1.qmo@gmail.com, babersleekhive@gmail.com\r\n";
// $headers .= "Reply-To: {$full_name} <{$email}>\r\n";
// $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
// Send email - use @ to suppress warnings that might break JSON response
// $emailSent = @mail($to, $subject, $body, $headers);

$body    = "A new student inquiry has been submitted from the website:\r\n\r\n"
         . "========================================\r\n"
         . "STUDENT DETAILS\r\n"
         . "========================================\r\n"
         . "Name: {$full_name}\r\n"
         . "Email: {$email}\r\n"
         . "Preferred Course: {$prefCourse}\r\n"
         . "Preferred Days: {$prefDays}\r\n"
         . "\r\n"
         . "Additional Details:\r\n"
         . "{$extraDetails}\r\n"
         . "\r\n"
         . "========================================\r\n"
         . "SUBMISSION INFO\r\n"
         . "========================================\r\n"
         . "Submitted on: " . date('Y-m-d H:i:s') . "\r\n"
         . "IP Address: {$ip_address}\r\n"
         . "Submission ID: #{$inserted_id}\r\n"
         . "\r\n"
         . "Please respond within 24 hours.\r\n";


// Optional: Send auto-reply to customer
// $customerSubject = "Thank you for your interest in Quran Master Online";
// $customerHeaders = "From: Quran Master Online <noreply@quranonlinemaster.com>\r\n";
// $customerHeaders .= "Content-Type: text/plain; charset=UTF-8\r\n";
// @mail($email, $customerSubject, $customerBody, $customerHeaders);


$customerBody = "Assalamu Alaikum {$full_name},\r\n\r\n"
              . "Thank you for your interest in learning Quran with us!\r\n\r\n"
              . "We have received your inquiry and one of our coordinators will contact you within 24 hours, in shaa Allah.\r\n\r\n"
              . "Your Details:\r\n"
              . "Preferred Course: {$prefCourse}\r\n"
              . "Preferred Days: {$prefDays}\r\n"
              . "\r\n"
              . "If you have any urgent questions, please contact us:\r\n"
              . "US: +1 (201) 591-5705\r\n"
              . "UK: +44 (207) 193-1528\r\n"
              . "WhatsApp: +44 207 193 1528\r\n"
              . "\r\n"
              . "Jazakallah Khair,\r\n"
              . "Quran Master Online Team\r\n";

// Check if this is an AJAX request



try {
    $mail = new PHPMailer(true);
    // SMTP Configuration
    $mail->isSMTP();
    $mail->Host       = 'nc-ph-2830.appxide.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'info@quranonlinemaster.com';
    $mail->Password   = 'fsy+$2bib4S:.t@'; // 🔴 replace
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // SSL
    $mail->Port       = 465;
    $mail->CharSet    = 'UTF-8';

    // Email Headers
    $mail->setFrom('info@quranonlinemaster.com', 'Quran Master Online');
    $mail->addAddress('info@quranmasteronline.com');
    $mail->addCC('qmoleads1.qmo@gmail.com');
    $mail->addCC('babarsleekhive@gmail.com');
    $mail->addReplyTo($email, $full_name);

    // Email Content
    $mail->isHTML(false);
    $mail->Subject = 'New Student Inquiry - Quran Master Online';
    $mail->Body    = $body;

    $mail->send();

    /**
     * AUTO-REPLY TO CUSTOMER
     */
    $reply = new PHPMailer(true);
    $reply->isSMTP();
    $reply->Host       = 'nc-ph-2830.appxide.com';
    $reply->SMTPAuth   = true;
    $reply->Username   = 'info@quranonlinemaster.com';
    $reply->Password   = 'fsy+$2bib4S:.t@';
    $reply->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $reply->Port       = 465;
    $reply->CharSet    = 'UTF-8';

    $reply->setFrom('info@quranonlinemaster.com', 'Quran Master Online');
    $reply->addAddress($email, $full_name);
    $reply->Subject = 'Thank you for your interest in Quran Master Online';
    $reply->Body    = $customerBody;
    $reply->send();

} catch (Exception $e) {
    print_r('Message could not be sent. Mailer Error: ' . $mail->ErrorInfo);
    print_r('reply could not be sent. Mailer Error: ' . $reply->ErrorInfo);

    error_log('SMTP Error: ' . $e->getMessage());
}

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    // AJAX request - return JSON response
    echo json_encode([
        'success'  => true,
        'message' => 'Jazakallah Khair! Your inquiry has been submitted successfully. We will contact you within 24 hours, in shaa Allah.',
        'submission_id' => $inserted_id,
        'redirect' => 'thank-you.php'
    ]);
    exit;
} else {
    // Regular form submission - redirect to thank you page
    header('Location: thank-you.php');
    exit;
}
