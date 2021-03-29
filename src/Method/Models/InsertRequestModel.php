<?php

namespace Finvalda\Method\Models;

use Finvalda\Http\RequestInterface;

class InsertRequestModel
{
    /** @var string */
    protected $requestType = RequestInterface::TYPE_INSERT;

    /** @var FinvaldaConfig */
    protected $finvaldaConfig;

    /** @var \stdClass */
    protected $itemObject;

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
        $this->productRequestType = $requestType;
    }

    public function setFinvaldaConfig(FinvaldaConfig $finvaldaConfig)
    {
        $this->finvaldaConfig = $finvaldaConfig;
    }

    public function getFinvaldaConfig():FinvaldaConfig
    {
        return $this->finvaldaConfig;
    }

    /**
     * @return string
     */
    public function getParameter():?string
    {
        return $this->parameter;
    }

    /**
     * @param string $parameter
     */
    public function setParameter(string $parameter):void
    {
        $this->parameter = $parameter;
    }

    /**
     * @return \stdClass
     */
    public function getItemObject():\stdClass
    {
        return $this->itemObject;
    }

    /**
     * @param \stdClass $itemObject
     */
    public function setItemObject(\stdClass $itemObject):void
    {
        $this->itemObject = $itemObject;
    }

    /**
     * @return string
     */
    public function getItemClassName():string
    {
        return $this->itemClassName;
    }

    /**
     * @param string $itemClassName
     */
    public function setItemClassName(string $itemClassName):void
    {
        $this->itemClassName = $itemClassName;
    }

    /**
     * @return string
     */
    public function getFunctionName():string
    {
        return $this->functionName;
    }

    /**
     * @param string $function
     */
    public function setFunctionName(string $functionName):void
    {
        $this->functionName = $functionName;
    }
}
