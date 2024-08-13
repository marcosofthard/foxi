<?php

// Pix - Consult a transcation

include __DIR__ . '/../vendor/autoload.php';

$apiKey = "";
$apiSecret = "";
$transactionId = "";

try {
    $foxi = new FOXI\SDK\FOXI($apiKey, $apiSecret);
    $qrcode = $foxi->withPix()->consultTransaction($transactionId);
    var_dump($qrcode);
} catch (\Exception $err) {
    echo "Error: {$err->getMessage()}";
}
