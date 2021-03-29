<?php

namespace Finvalda\Method\Models;

class Client
{
    /** @var bool */
    protected $isClientExist;

    public function __construct()
    {
        $this->setIsClientExist(false);
    }

    public function isClientExist(): bool
    {
        return $this->isClientExist;
    }

    public function setIsClientExist(bool $isClientExist)
    {
        $this->isClientExist = $isClientExist;
    }

}
