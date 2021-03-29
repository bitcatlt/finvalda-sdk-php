<?php

namespace Finvalda\Method;

use Finvalda\Method\Models\FinvaldaConfig;
use Finvalda\Method\Models\InsertRequestModel;
use Finvalda\Method\Models\ProductRequestModel;

trait RequestTrait
{
    /** @var ProductRequestModel */
    protected $productRequestModel;

    /** @var InsertRequestModel */
    protected $insertRequestModel;

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

    public function getInsertRequestModel():InsertRequestModel
    {
        return $this->insertRequestModel;
    }

    public function getConfig():FinvaldaConfig
    {
        if (null !== $this->insertRequestModel) {
            return $this->insertRequestModel->getFinvaldaConfig();
        }

        return $this->productRequestModel->getFinvaldaConfig();
    }

    public function getProvider():string
    {
        return 'Finvalda';
    }
}
