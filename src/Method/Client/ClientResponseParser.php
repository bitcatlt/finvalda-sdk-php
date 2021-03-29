<?php

namespace Finvalda\Method\Client;

use Finvalda\Http\ResponseInterface;
use Finvalda\Method\Models\Client;

class ClientResponseParser
{
    public function extractResponse(ResponseInterface $providerResponse):Client
    {
        $response = $providerResponse->getResponseObject();
        $client = new Client();

        if ($response->GetKlientasResult === 'Success'){
            $client->setIsClientExist(true);
        }

        return $client;
    }
}
