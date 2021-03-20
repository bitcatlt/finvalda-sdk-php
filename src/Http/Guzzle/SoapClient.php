<?php

namespace Finvalda\Http;

use Finvalda\Http\Guzzle\RequestStatisticCollector;
use Finvalda\Http\Guzzle\Response;
use Psr\Log\LoggerAwareTrait;

class SoapClient
{
    use LoggerAwareTrait;

    /** @var SoapRequestInterface */
    protected $request;

    /** @var string */
    protected $socketTimeout = '10';

    /** @var  \SoapClient */
    protected $client;

    /** @var array */
    protected $clientOptions = [
        'exceptions' => 0,
        'connection_timeout' => 10
    ];

    /** @var ResponseErrorParser */
    protected $responseErrorParser;

    public function setResponseErrorParser(ResponseErrorParser $responseErrorParser)
    {
        $this->responseErrorParser = $responseErrorParser;
    }

    protected function getSocketTimeOut():string
    {
        if (isset($this->request->getClientOptions()['socket_timeout'])) {
            $this->socketTimeout = $this->request->getClientOptions()['socket_timeout'];
        }

        return $this->socketTimeout;
    }

    protected function getStatisticCollector():RequestStatisticCollector
    {
        return new RequestStatisticCollector();
    }

    protected function getClient(string $wsdl, array $options = null):\SoapClient
    {
        if (null === $this->client) {
            if (null !== $options && is_array($options)) {
                $this->clientOptions = array_merge($this->clientOptions, $options);
            }

            $this->client = new \SoapClient($wsdl, $this->clientOptions);
        }

        return $this->client;
    }

    public function send(SoapRequestInterface $providerRequest):ResponseInterface
    {
        $this->request = $providerRequest;

        $collector = $this->getStatisticCollector();
        $collector->setLogger($this->logger);
        $collector->start();
        $this->setSocketTimeOut();

        $client = $this->getClient($providerRequest->getWsdl(), $providerRequest->getClientOptions());

        if (method_exists($providerRequest, 'getSoapHeader')) {
            $client->__setSoapHeaders($providerRequest->getSoapHeader());
        }

        $response = $client->__soapCall(
            $providerRequest->getFunction(),
            $providerRequest->getParameters(),
            $providerRequest->getOptions(),
            $providerRequest->getHeader()
        );

        $providerResponse = new Response();
        if (is_soap_fault($response)) {
            $errorMessage = 'SOAP Fault. Code: ' . $response->faultcode . ', Message: ' . $response->faultstring;
            $providerResponse->setErrorMessage($errorMessage);

            if (null !== $this->responseErrorParser && !$this->responseErrorParser->isFaultyResponse($response)) {
                $providerResponse->setData($response);
            } else {
                $providerResponse->setHasErrors(true);
            }
        } else {
            $providerResponse->setData($response);
        }

        $collector->stop();
        $collector->log($providerRequest, $providerResponse);

        return $providerResponse;
    }

    protected function setSocketTimeOut():void
    {
        ini_set('default_socket_timeout', $this->getSocketTimeOut());
    }
}
