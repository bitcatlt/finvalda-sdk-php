<?php

namespace Finvalda\Method\Models;

use Finvalda\Http\RequestInterface;

class RequestModel
{
    /** @var string */
    protected $requestType = RequestInterface::TYPE_INSERT;

    /** @var FinvaldaConfig */
    protected $finvaldaConfig;

    /** @var string */
    protected $xmlString;

    /** @var string */
    protected $itemClassName;

    /** @var string */
    protected $parameter;

    /** @var string */
    protected $functionName;

    public function getRequestType():string
    {
        return $this->requestType;
    }

    public function setRequestType(string $requestType):void
    {
        $this->requestType = $requestType;
    }

    public function setFinvaldaConfig(FinvaldaConfig $finvaldaConfig)
    {
        $this->finvaldaConfig = $finvaldaConfig;
    }

    public function getFinvaldaConfig():FinvaldaConfig
    {
        return $this->finvaldaConfig;
    }

    public function getParameter():?string
    {
        return $this->parameter;
    }

    public function setParameter(string $parameter):void
    {
        $this->parameter = $parameter;
    }

    public function getXmlString():string
    {
        return $this->xmlString;
    }

    public function setXmlString(string $xmlString):void
    {
        $this->xmlString = $xmlString;
    }

    public function getItemClassName():string
    {
        return $this->itemClassName;
    }

    public function setItemClassName(string $itemClassName):void
    {
        $this->itemClassName = $itemClassName;
    }

    public function getFunctionName():string
    {
        return $this->functionName;
    }

    public function setFunctionName(string $functionName):void
    {
        $this->functionName = $functionName;
    }
}
