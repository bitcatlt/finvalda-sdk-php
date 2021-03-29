<?php

namespace Finvalda\Method\Insert;

use Finvalda\Http\SoapRequestInterface;
use Finvalda\Method\Models\InsertRequestModel;
use Finvalda\Method\RequestTrait;

class InsertRequest implements SoapRequestInterface
{
    use RequestTrait;

    public function __construct(InsertRequestModel $insertRequestModel)
    {
        $this->insertRequestModel = $insertRequestModel;
    }

    public function getType():string
    {
        return $this->getInsertRequestModel()->getRequestType();
    }

    public function getFunction():string
    {
        return $this->getInsertRequestModel()->getFunctionName();
    }

    public function getParameters():array
    {
        $params = new \stdClass();
        $params->ItemClassName = $this->getInsertRequestModel()->getItemClassName();

        if (null !== $this->getInsertRequestModel()->getParameter()) {
            $params->sParametras = $this->getInsertRequestModel()->getParameter();
        }

        if (null !== $this->getInsertRequestModel()->getXmlString()) {
            $params->xmlString = $this->getInsertRequestModel()->getXmlString();
        }

        return [$params];
    }

}
