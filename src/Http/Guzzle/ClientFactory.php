<?php

namespace Finvalda\Http\Guzzle;

use Finvalda\Http\ClientInterface;
use Psr\Log\LoggerAwareTrait;

class ClientFactory
{
    use LoggerAwareTrait;

    public function get(string $providerName):ClientInterface
    {
        $clientClassName = $this->getClassName($providerName);

        $provider = null;
        if (class_exists($clientClassName)) {
            /** @var ClientInterface $provider */
            $provider = new $clientClassName();
            $provider->setLogger($this->logger);
        }

        return $provider;
    }

    protected function getClassName(string $provider):string
    {
        $path = '\Providers';
        $path .= ucfirst($provider);
        $path .= '\Client';

        return $path;
    }
}
