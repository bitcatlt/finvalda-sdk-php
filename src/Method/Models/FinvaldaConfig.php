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

    public function getWsdl():string
    {
        return $this->wsdl;
    }

    public function setWsdl(string $wsdl):void
    {
        $this->wsdl = $wsdl;
    }

    public function getUsername():string
    {
        return $this->username;
    }

    public function setUsername(string $username):void
    {
        $this->username = $username;
    }

    public function getPassword():string
    {
        return $this->password;
    }

    public function setPassword(string $password):void
    {
        $this->password = $password;
    }

    public function getCompanyId():string
    {
        return $this->companyId;
    }

    public function setCompanyId(string $companyId):void
    {
        $this->companyId = $companyId;
    }
}
