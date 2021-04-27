<?php

namespace Finvalda\Method\Models;

use Finvalda\Http\RequestInterface;

class ClientRequestModel
{
    /** @var string */
    protected $clientCode;

    /** @var string */
    protected $requestType = RequestInterface::TYPE_GET_COMPANY;

    /** @var FinvaldaConfig */
    protected $finvaldaConfig;

    public function getRequestType():string
    {
        return $this->requestType;
    }

    public function setRequestType(string $requestType):void
    {
        $this->requestType = $requestType;
    }

    public function setFinvaldaConfig(FinvaldaConfig $finvaldaConfig)
    {
        $this->finvaldaConfig = $finvaldaConfig;
    }

    public function getFinvaldaConfig(): FinvaldaConfig
    {
        return $this->finvaldaConfig;
    }

    public function getClientCode():string
    {
        return $this->clientCode;
    }

    public function setClientCode(string $clientCode):void
    {
        $this->clientCode = $clientCode;
    }
}
