<?php

namespace Finvalda\Http\Guzzle;

use Finvalda\Http\RequestInterface;
use Finvalda\Http\ResponseInterface;
use Finvalda\Http\SoapRequestInterface;
use Psr\Log\LoggerAwareTrait;

class RequestStatisticCollector
{
    use LoggerAwareTrait;

    /** @var float */
    protected $started = 0;

    /** @var float */
    protected $finished = 0;

    /** @var array */
    protected $logResponse = [
        RequestInterface::TYPE_ORDER_RESERVATION
    ];

    /** @var array */
    private $loggableRequests = [
        RequestInterface::TYPE_PRODUCT,
        RequestInterface::TYPE_ORDER_RESERVATION
    ];

    public function start():void
    {
        $this->started = microtime(true);
    }

    public function stop():void
    {
        $this->finished = microtime(true);
    }

    public function getDuration():float
    {
        return $this->finished - $this->started;
    }

    public function log(RequestInterface $providerRequest, ResponseInterface $providerResponse)
    {
        $logData = [
            'state' => $providerResponse->getState(),
            'requestData' => $this->getRequestData($providerRequest),
            'provider' => $providerRequest->getProvider(),
            'type' => $providerRequest->getType(),
            'errorMessage' => $providerResponse->getErrorMessage(),
            'response' => $this->getAPIResponse($providerRequest, $providerResponse),
            'errorStatus' => $providerResponse->hasErrors() ? $providerResponse->getErrorType() : 'OK',
            'duration' => $this->getDuration(),
        ];

        if ($this->shouldLogTheResponse($providerRequest)) {
            $logData['responseString'] = mb_detect_encoding($providerResponse->getResponseString());
        }

        if (method_exists($providerResponse, 'getHeaders')) {
            $logData['responseHeader'] = var_export($providerResponse->getHeaders(), true);
        }

        $this->logger && $this->logger->info('Request to provider', ['log_object' => $logData]);
    }

    private function shouldLogTheResponse(RequestInterface $providerRequest):bool
    {
        $log = false;
        if (in_array($providerRequest->getType(), $this->logResponse)) {
            $log = true;
        }

        return $log;
    }

    private function getRequestData(RequestInterface $providerRequest):string
    {
        $data = '';

        if (in_array($providerRequest->getType(), $this->loggableRequests)) {
            if ($providerRequest instanceof SoapRequestInterface) {
                $data = $providerRequest->getWsdl() . ' ' . $providerRequest->getFunction() . ' '
                    . var_export($providerRequest->getParameters(), true)
                    . var_export($providerRequest->getClientOptions(), true);
            }
        }

        return $data;
    }

    private function getAPIResponse(RequestInterface $providerRequest, ResponseInterface $providerResponse):string
    {
        $responseToReturn = '';

        if ($this->shouldLogTheResponse($providerRequest)) {
            $responseToReturn = $providerResponse->getResponseString();
        }

        return $responseToReturn;
    }
}
