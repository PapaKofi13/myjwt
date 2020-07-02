<?php
require 'bootstrap.php';

// get the local secret key
$secret = getenv('SECRET');


// Create the token header
$header = json_encode([
    'typ' => 'JWT',  //type is jwt
    'alg' => 'HS256'  // algorithim is hs256
]);


// Create the token payload
$payload = json_encode([
    'user_id' => 1,  //user id 
    'role' => 'admin',   // role of the user
    'exp' => 1593828222  // message goes here
]);

// Encode Header
$base64UrlHeader = base64UrlEncode($header);

// Encode Payload
$base64UrlPayload = base64UrlEncode($payload);

// Create Signature Hash
$signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, $secret, true);

// Encode Signature to Base64Url String
$base64UrlSignature = base64UrlEncode($signature);

// Create JWT
$jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;

echo "Your token:\n" . $jwt . "\n";
?>