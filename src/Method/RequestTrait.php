<?php

namespace Finvalda\Method;

use Finvalda\Method\Models\Config;
use Finvalda\Method\Models\ProductRequestModel;

trait RequestTrait
{
    /** @var ProductRequestModel */
    protected $productRequestModel;

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

    public function getProductRequestModel():ProductRequestModel
    {
        return $this->productRequestModel;
    }

    public function getConfig():Config
    {
        return $this->productRequestModel->getConfig();
    }

    public function getProvider():string
    {
        return 'Finvalda';
    }
}
