<?php

// Oauth / Refresh

include __DIR__ . '/../vendor/autoload.php';

$apiKey = "";
$apiSecret = "";

try {
    echo "oauth: ";
    $foxi = new FOXI\SDK\FOXI($apiKey, $apiSecret);
    var_dump($foxi);

    echo "refresh: ";
    $foxi->refreshToken();
    var_dump($foxi);
} catch (\Exception $err) {
    echo "Error: {$err->getMessage()}";
}
