<?php

namespace FOXI\SDK\Gateway;

use FOXI\SDK\FOXI;
use FOXI\SDK\HTTPClient;

abstract class BaseGateway
{
    /**
     * @var FOXI
     */
    protected $foxi;

    /**
     * @var HTTPClient
     */
    protected $httpClient;

    /**
     * @param FOXI $foxi
     */
    public function __construct(FOXI $foxi)
    {
        $this->foxi = $foxi;
        $this->httpClient = $foxi->withApi();
    }
}
