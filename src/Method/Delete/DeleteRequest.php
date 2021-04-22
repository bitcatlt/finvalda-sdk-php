<?php

namespace Finvalda\Method\Delete;

use Finvalda\Http\SoapRequestInterface;
use Finvalda\Method\Models\RequestModel;
use Finvalda\Method\RequestTrait;

class DeleteRequest implements SoapRequestInterface
{
    use RequestTrait;

    public function __construct(RequestModel $requestModel)
    {
        $this->requestModel = $requestModel;
    }

    public function getType():string
    {
        return $this->getRequestModel()->getRequestType();
    }

    public function getFunction():string
    {
        return $this->getRequestModel()->getFunctionName();
    }

    public function getParameters():array
    {
        $params = new \stdClass();
        $params->ItemClassName = $this->getRequestModel()->getItemClassName();

        if (null !== $this->getRequestModel()->getParameter()) {
            $params->sParametras = $this->getRequestModel()->getParameter();
        }

        if (null !== $this->getRequestModel()->getXmlString()) {
            $params->xmlString = $this->getRequestModel()->getXmlString();
        }

        return [$params];
    }

}
