<?php

namespace Finvalda\Method\Client;

use Finvalda\Http\SoapRequestInterface;
use Finvalda\Method\Models\ClientRequestModel;

class ClientRequest implements SoapRequestInterface
{
    use RequestTrait;

    public function __construct(ClientRequestModel $clientRequestModel)
    {
        $this->clientRequestModel = $clientRequestModel;
    }

    public function getFunction():string
    {
        return 'GetKlientas';
    }

    public function getType():string
    {
        return $this->getClientRequestModel()->getRequestType();
    }

    public function getParameters():array
    {
        $params = new \stdClass();

        if (null !== $this->getClientRequestModel()->getClientCode()) {
            $params->sKliKod = $this->getClientRequestModel()->getClientCode();
        }

        $params->writeSchema  = false;

        return [$params];
    }
}
