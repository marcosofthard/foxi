<?php

// PixIn - QRCode

include __DIR__ . '/../vendor/autoload.php';

$apiKey = "";
$apiSecret = "";
$depositType = "PIX_ESTATIC";
$depositAmount = 1.50;

try {
    $foxi = new FOXI\SDK\FOXI($apiKey, $apiSecret);
    $qrcode = $foxi->withPix()->generateQRCode($depositType, $depositAmount);
    var_dump($qrcode);
} catch (\Exception $err) {
    echo "Error: {$err->getMessage()}";
}
