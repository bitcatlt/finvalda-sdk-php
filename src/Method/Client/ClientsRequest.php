<?php

namespace Finvalda\Method\Client;

use Finvalda\Http\SoapRequestInterface;
use Finvalda\Method\Models\ClientRequestModel;

class ClientsRequest implements SoapRequestInterface
{
    use RequestTrait;

    public function __construct(ClientRequestModel $clientRequestModel)
    {
        $this->clientRequestModel = $clientRequestModel;
    }

    public function getFunction():string
    {
        return 'GetKlientus';
    }

    public function getType():string
    {
        return $this->getClientRequestModel()->getRequestType();
    }

    public function getParameters():array
    {
        $params = new \stdClass();
        $params->writeSchema  = false;

        return [$params];
    }
}
