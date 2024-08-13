<?php

// Pix - Consult a key

include __DIR__ . '/../vendor/autoload.php';

$apiKey = "";
$apiSecret = "";
$consultKey = "";

try {
    $foxi = new FOXI\SDK\FOXI($apiKey, $apiSecret);
    $qrcode = $foxi->withPix()->consultKey($consultKey);
    var_dump($qrcode);
} catch (\Exception $err) {
    echo "Error: {$err->getMessage()}";
}

