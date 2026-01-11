<?php
session_start();
require_once 'vendor/autoload.php'; // If using Composer

// Get the JSON input
$json = file_get_contents('php://input');
$data = json_decode($json, true);

if (isset($data['credential'])) {
    $client_id = 'YOUR_GOOGLE_CLIENT_ID.apps.googleusercontent.com';
    
    // Verify the Google token
    $client = new Google_Client(['client_id' => $client_id]);
    $payload = $client->verifyIdToken($data['credential']);
    
    if ($payload) {
        $google_id = $payload['sub'];
        $email = $payload['email'];
        $name = $payload['name'];
        $picture = $payload['picture'];
        
        // Check if user exists in your database or create new user
        // Example: 
        // $user = getUserByGoogleId($google_id) or createUserFromGoogle($google_id, $email, $name);
        
        // Set session
        $_SESSION['user_id'] = $google_id;
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $name;
        
        echo json_encode([
            'success' => true,
            'redirect' => 'dashboard.php'
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Invalid Google token'
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'No credential provided'
    ]);
}
?>