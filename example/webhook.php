<?php

// Webhook

include __DIR__ . "/../vendor/autoload.php";

$webhookSecret = "";

try {
    $foxi = new FOXI\SDK\FOXI("", "", false); // for this case oauth is not necessary, just webhookSecret
    $webhookData = $foxi->handleWebhook($webhookSecret);

    // only for debug
    $logFile = fopen("log_foxi_webhook.txt", "a+");
    fwrite($logFile, json_encode($webhookData, JSON_PRETTY_PRINT) . PHP_EOL);
    fclose($logFile);
} catch (\Exception $err) {
    echo "Error: {$err->getMessage()}";
}
