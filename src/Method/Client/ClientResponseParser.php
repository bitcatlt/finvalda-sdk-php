<?php

namespace Finvalda\Method\Client;

use Finvalda\Http\ResponseInterface;
use Finvalda\Http\ResponseParserInterface;
use Finvalda\Method\Models\Client;

class ClientResponseParser implements ResponseParserInterface
{
    public function parseResponse(ResponseInterface $providerResponse):Client
    {
        $response = $providerResponse->getResponseObject();
        $client = new Client();

        if ($response->GetKlientasResult === 'Success'){
            $client->setIsClientExist(true);
        }

        return $client;
    }
}
