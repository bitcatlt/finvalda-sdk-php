<?php

namespace Finvalda\Method;

use Finvalda\Method\Models\FinvaldaConfig;
use Finvalda\Method\Models\ProductRequestModel;
use Finvalda\Method\Models\RequestModel;

trait RequestTrait
{
    /** @var ProductRequestModel */
    protected $productRequestModel;

    /** @var RequestModel */
    protected $requestModel;

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

    public function getRequestModel():RequestModel
    {
        return $this->requestModel;
    }

    public function getConfig():FinvaldaConfig
    {
        if (null !== $this->requestModel) {
            return $this->requestModel->getFinvaldaConfig();
        }

        return $this->productRequestModel->getFinvaldaConfig();
    }

    public function getProvider():string
    {
        return 'Finvalda';
    }
}
