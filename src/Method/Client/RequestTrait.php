<?php

namespace Finvalda\Method\Client;

use Finvalda\Method\Models\ClientRequestModel;
use Finvalda\Method\Models\FinvaldaConfig;

trait RequestTrait
{
    /** @var ClientRequestModel */
    protected $clientRequestModel;

    /** @var string */
    protected $finvaldaWebserviceUrl = 'http://www.fvs.lt/webservices';

    public function getOptions():array
    {
        return ['exception' => 0];
    }

    public function getClientOptions()
    {
        return null;
    }

    public function getWsdl()
    {
        return $this->getConfig()->getWsdl();
    }

    public function getHeader()
    {
        $credentials = [
            'UserName' => $this->getConfig()->getUsername(),
            'Password' => $this->getConfig()->getPassword(),
            'CompanyID' => $this->getConfig()->getCompanyId(),
            'RemoveEmptyStringTags' => false,
            'RemoveZeroNumberTags' => false,
            'RemoveNewLines' => false,
        ];

        $header = new \SoapHeader($this->finvaldaWebserviceUrl, 'AuthHeader', $credentials);

        return [$header];
    }

    public function getRequestOptions():array
    {
        return [];
    }

    public function getClientRequestModel():ClientRequestModel
    {
        return $this->clientRequestModel;
    }


    public function getConfig():FinvaldaConfig
    {
        return $this->clientRequestModel->getFinvaldaConfig();
    }

    public function getProvider():string
    {
        return 'Finvalda';
    }
}
