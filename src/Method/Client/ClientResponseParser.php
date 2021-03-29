<?php

namespace Finvalda\Method\Client;

use Finvalda\Http\InsertResponseParserInterface;
use Finvalda\Http\ResponseInterface;
use Finvalda\Method\ResponseTrait;

class ClientResponseParser implements InsertResponseParserInterface
{
    use ResponseTrait;

    public function extractResponse(ResponseInterface $providerResponse):string
    {
        // TODO: Implement extractResponse() method.
        $response = $this->getFinvaldaResponseXML($providerResponse);
        if (true){

        }
        return 'success';
    }
}
