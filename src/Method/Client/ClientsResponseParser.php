<?php

namespace Finvalda\Method\Client;

use Finvalda\Http\ResponseInterface;
use Finvalda\Http\ResponseParserInterface;
use Finvalda\Method\Models\Client;
use Finvalda\Method\ResponseTrait;

class ClientsResponseParser implements ResponseParserInterface
{
    use ResponseTrait;

    public function parseResponse(ResponseInterface $providerResponse):array
    {
        $clientsList = [];

        $result = $this->getFinvaldaResponseXML($providerResponse);
        if (!$providerResponse->hasErrors()) {
            foreach ($result->{'Fvs.Klientas'} ?? [] as $item) {
                $client = new Client();
                $client->setFvsUserCode((string)$item->sKodas);
                $client->setName((string)$item->sPavadinimas);
                $client->setAddress((string)$item->sAdresas);
                $client->setPhone((string)$item->sTelefonas);
                $client->setCompanyCode((string)$item->sImKodas);
                $client->setVatCode((string)$item->sPvmMoketojoKod);
                $client->setIsClientExist(true);

                $clientsList[] = $client;
            }
        }

        return $clientsList;
    }
}
