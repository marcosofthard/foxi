<?php

namespace FOXI\SDK\Gateway;

use FOXI\SDK\FOXI;

class CryptoGateway extends BaseGateway
{
    /**
     * @const int
     */
    public const MIN_DEPOSIT_BRL = 5;

    /**
     * @param FOXI $foxi
     */
    public function __construct(FOXI $foxi)
    {
        parent::__construct($foxi);
    }

    /**
     * @param float $amount
     * @param string $expiration
     * @return void
     */
    public function generateURL($amount, $expiration = "30M")
    {
        if (!is_numeric($amount) || !is_string($expiration) || $amount < CryptoGateway::MIN_DEPOSIT_BRL) {
            return false;
        }

        $data = [
            "expiration" => (string) $expiration,
            "amount_brl" => (float) $amount
        ];
        $res = $this->httpClient->request("/crypto/receive", "POST", $data);
        
        if (!isset($res["success"]) || $res["success"] != true) {
            return false;
        }

        return [
            "id" => $res["result"]["id"],
            "url" => $res["result"]["url"],
            "amount_brl" => $res["result"]["amount_brl"]
        ];
    }
}
