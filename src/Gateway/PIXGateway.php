<?php

namespace FOXI\SDK\Gateway;

use FOXI\SDK\FOXI;

class PIXGateway extends BaseGateway
{
    /**
     * @param FOXI $foxi
     */
    public function __construct(FOXI $foxi)
    {
        parent::__construct($foxi);
    }

    /**
     * @param string $key
     * @param float $amount
     * @return array|false
     */
    public function generateQRCode($type, $amount)
    {
        if (!is_string($type) || !is_numeric($amount)) {
            return false;
        }

        $data = [
            "type" => (string) $type,
            "amount" => (float) $amount
        ];
        $res = $this->httpClient->request("/pix/qrcode", "POST", $data);
        
        if (!isset($res["success"]) || $res["success"] != true) {
            return false;
        }

        return [
            "id" => $res["result"]["id"],
            "emv" => $res["result"]["emv"]
        ];
    }

    /**
     * @param string $key
     * @return array|false
     */
    public function consultKey($key)
    {
        $res = $this->httpClient->request("/pix/consult/key/{$key}", "GET");
        
        if (!isset($res["success"]) || $res["success"] != true) {
            return false;
        }

        return $res["result"];
    }

    /**
     * @param string $id
     * @return array|false
     */
    public function consultTransaction($id)
    {
        $res = $this->httpClient->request("/pix/check/{$id}", "GET");
        
        if (!isset($res["success"]) || $res["success"] != true) {
            return false;
        }

        return $res["result"];
    }

    /**
     * @param string $key
     * @param float $amount
     * @param string $type
     * @return array
     */
    public function transferTo($key, $amount, $type = "CPF_CNPJ")
    {
        if (!is_string($key) || !is_numeric($amount) || !is_string($type)) {
            return false;
        }

        $data = [
            "key" => (string) $key,
            "amount" => (float) $amount,
            "type" => (string) $type
        ];

        return $this->httpClient->request("/pix/send", "POST", $data);
    }
}
