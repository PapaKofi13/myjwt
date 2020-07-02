<?php


//generates key to be put in the secret in .env
$secret = bin2hex(random_bytes(32));  // change this to avalidation key 
echo "Secret:\n";
echo $secret;
echo "\nCopy this key to the .env file like this:\n";
echo "SECRET=" . $secret . "\n";