<?php
// SUBMIT/SEND CONFIG

// Asset URL
// Replace with the document root path to the application
$baseURL = 'REPLACE_APP_URL_HERE';

// Allowed domains
// Add whitelist domains here (to allow POST requests)
$allowedDomains = array(
    'localhost',
    'ecards'
);

// STOP EDITING HERE
// Get Headers
$headers = $_SERVER['HTTP_REFERER'];
$host = parse_url($headers);

// Check if host is same as app
if(in_array( $host['host'], $allowedDomains)) {

	// Get the request from JS/Post
    $request = file_get_contents('php://input');
    $postData = json_decode($request, true);

    // Email options
    $subject = "You received an eCard from " . $postData['ecard_message']['from'][0]['name'];
    $headers = "From: " . $postData['ecard_message']['from'][0]['name'] . " <" . $postData['ecard_message']['from'][0]['email'] . ">" . "\n" . "Reply-To: " . $postData['ecard_message']['from'][0]['email'] . "\n" . "MIME-Version: 1.0" . "\n" . "Content-type: text/html; charset=UTF-8" . "\n";

    // Store Sent Arrays
    $recipientSent = [];
    $recipientEmail = [];

    // If postData exists and is not empty
    if ($postData && !empty($postData)){

        // Get all recipients
        $recipients = $postData['ecard_message']['to'];

        // Process each recipient in POST array
        foreach ($recipients as $recipient) {

            // Check each recipient email as valid
            if (!filter_var($recipient['email'], FILTER_VALIDATE_EMAIL)) {
                $recipientError = true;
            }

            // Create customized email per each recipient
            include 'email-ecard.php';

            // If no recipient email errors, and not a duplicate recipient
            // checking for duplicate email address helps prevent spam blasts
            if (!isset($recipientError) && !in_array($recipient['email'], $recipientEmail)){

                // Send email per reciepient
                mail($recipient['email'], $subject, $message, $headers);

                // Save to Email array
                array_push($recipientEmail, $recipient['email']);
                // Add to Sent array
                array_push($recipientSent, $recipient);
            }

            // Unset recipient error
            unset($recipientError);

        }

        // Check if any emails were sent
        if (!empty($recipientSent)){

            // Success email
            include 'email-success.php';

            // Return final data
            echo json_encode($recipientSent, true);
            exit(); //Stop running the script

        } else {

            // Return error
            echo 'error';
            exit(); //Stop running the script

        }

    } else {

        // Return error
        echo 'error';
        exit(); //Stop running the script
    }

} else {

    echo "error";
    exit(); //Stop running the script
} ?>
