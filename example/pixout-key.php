<?php

// PixOut - Transfer to key

include __DIR__ . '/../vendor/autoload.php';

$apiKey = "";
$apiSecret = "";
$type = "CPF_CNPJ";
$transferKey = "";
$transferAmount = 1.50;

try {
    $foxi = new FOXI\SDK\FOXI($apiKey, $apiSecret);
    $qrcode = $foxi->withPix()->transferTo($transferKey, $transferAmount, $type);
    var_dump($qrcode);
} catch (\Exception $err) {
    echo "Error: {$err->getMessage()}";
}

