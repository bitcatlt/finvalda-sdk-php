<?php

namespace Finvalda\Method\Models;

class FinvaldaConfig
{
    /** @var string */
    protected $wsdl;

    /** @var string */
    private $username;

    /** @var string */
    private $password;

    /** @var string */
    private $companyId;

    /**
     * @return string
     */
    public function getWsdl():string
    {
        return $this->wsdl;
    }

    /**
     * @param string $wsdl
     */
    public function setWsdl(string $wsdl):void
    {
        $this->wsdl = $wsdl;
    }

    /**
     * @return string
     */
    public function getUsername():string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username):void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword():string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password):void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getCompanyId():string
    {
        return $this->companyId;
    }

    /**
     * @param string $companyId
     */
    public function setCompanyId(string $companyId):void
    {
        $this->companyId = $companyId;
    }
}
