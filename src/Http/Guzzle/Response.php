<?php

namespace Request;

class Response implements ResponseInterface
{
    /** @var  bool */
    protected $hasErrors = false;

    /** @var  bool */
    protected $hasServerErrors = false;

    /** @var  string */
    protected $errorMessage;

    /** @var  string */
    protected $parsingErrorMessage;

    /** @var  string|array */
    protected $response;

    /** @var  bool */
    protected $isTimeOuted = false;

    /** @var int */
    private $statusCode;

    /** @var array */
    private $responseHeaders;

    public function getResponseHeaders():array
    {
        return $this->responseHeaders;
    }

    public function setResponseHeaders(array $responseHeaders):void
    {
        $this->responseHeaders = $responseHeaders;
    }

    public function getStatusCode():int
    {
        return $this->statusCode;
    }

    public function setStatusCode(int $statusCode):void
    {
        $this->statusCode = $statusCode;
    }

    public function getErrorType():string
    {
        $type = ResponseInterface::ERROR_TYPE_UNKNOWN;

        if ($this->isTimeOuted()) {
            $type = ResponseInterface::ERROR_TYPE_TIMEOUT;
        } elseif ($this->hasServerErrors()) {
            $type = ResponseInterface::ERROR_TYPE_SERVER_DOWN;
        }

        return $type;
    }

    public function isTimeOuted():bool
    {
        return $this->isTimeOuted;
    }

    public function setIsTimeOuted():void
    {
        $this->setHasErrors(true);
        $this->isTimeOuted = true;
    }

    /**
     * Return true if unexpected error was
     */
    public function hasErrors():bool
    {
        return $this->hasErrors;
    }

    /**
     * Return true if server is down
     */
    public function hasServerErrors():bool
    {
        return $this->hasServerErrors;
    }

    /**
     * Unexpected Error setter
     */
    public function setHasErrors(bool $hasErrors = true):void
    {
        $this->hasErrors = $hasErrors;
    }

    /**
     * Server Error setter
     */
    public function setHasServerErrors(bool $hasErrors = true):void
    {
        if ($hasErrors) {
            $this->setHasErrors($hasErrors);
        }

        $this->hasServerErrors = $hasErrors;
    }

    /**
     * Response text setter
     *
     * @param string|array|object $response
     */
    public function setData($response):void
    {
        $this->response = $response;
    }

    /**
     * Response text getter
     *
     * @return string|array|object
     */
    public function getData()
    {
        return $this->response;
    }

    /**
     * Return response state
     */
    public function getState():string
    {
        $state = ResponseInterface::STATE_SUCCESS;

        if ($this->hasErrors()) {
            $state = ResponseInterface::STATE_ERROR;
        }

        return $state;
    }

    public function getResponseString():string
    {
        $data = $this->getData();

        $responseStr = '';
        if (!empty($data)) {
            $responseStr = (is_string($data)) ? $data : json_encode($data);
        }

        return $responseStr;
    }

    /**
     * Error message setter
     */
    public function setErrorMessage(string $message):void
    {
        $this->errorMessage = $message;
    }

    /**
     * Error message getter
     */
    public function getErrorMessage():string
    {
        return $this->errorMessage;
    }

    /**
     * @return string
     */
    public function getParsingErrorMessage():string
    {
        return $this->parsingErrorMessage;
    }

    /**
     * @param string $parsingErrorMessage
     */
    public function setParsingErrorMessage($parsingErrorMessage)
    {
        $this->parsingErrorMessage = $parsingErrorMessage;
    }

    /**
     * Returns xml as object
     *
     * @return \SimpleXMLElement|null
     */
    public function getResponseXML()
    {
        $result = null;
        libxml_use_internal_errors(true);
        try {
            $data = $this->getData();

            if (is_string($this->getData())) {
                $data = trim($this->getData());
            }

            $result = new \SimpleXMLElement($data);
        } catch (\Exception $e) {
            $this->setHasErrors();
            $this->setParsingErrorMessage('Bad response XMl. Response:' . $this->getData());
            libxml_clear_errors();
        }

        return $result;
    }

    /**
     * @return \stdClass|null|\Object
     */
    public function getResponseObject()
    {
        $response = null;
        if (is_object($this->getData())) {
            $response = $this->getData();
        } else {
            $this->setHasErrors();
            $this->setParsingErrorMessage('Bad response object. Response:' . $this->getData());
        }

        return $response;
    }

    /**
     * Decode json
     *
     * @return array|object
     */
    public function getResponseJson(bool $formatAssoc = false)
    {
        $result = null;
        $lastError = 0;

        if ($this->getData() != '') {
            $result = json_decode($this->getData(), $formatAssoc);
            $lastError = json_last_error();
        }

        if ($lastError !== JSON_ERROR_NONE) {
            $this->setHasErrors();
            $this->setParsingErrorMessage('Bad response JSON. Error: ' . $lastError . '. Response:' . $this->getData());
        }

        return $result;
    }
}
