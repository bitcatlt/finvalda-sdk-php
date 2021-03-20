<?php

namespace Finvalda\Http;

interface ResponseInterface
{
    const STATE_SUCCESS = 'success';
    const STATE_ERROR = 'failed';

    const ERROR_TYPE_TIMEOUT = 'timeout';
    const ERROR_TYPE_SERVER_DOWN = 'server_down';
    const ERROR_TYPE_UNKNOWN = 'unknown';

    public function getErrorType():string;

    /**
     * Return true if unexpected error was
     */
    public function hasErrors():bool;

    /**
     * Return true if unexpected error was
     */
    public function hasServerErrors():bool;

    /**
     * Unexpected Error setter
     */
    public function setHasErrors(bool $hasErrors = true):void;

    /**
     * Server Error setter
     */
    public function setHasServerErrors(bool $hasErrors = true):void;

    /**
     * Set Providers response data: xml, jason etc.
     *
     * @param string|array $response response from provider
     */
    public function setData($response):void;

    /**
     * Return providers response data.
     *
     * @return string|array
     */
    public function getData();

    /**
     * Returns xml as object
     * @return \SimpleXMLElement|null
     */
    public function getResponseXML();

    public function getResponseString():string;

    /**
     * @return \stdClass|null|\Object
     */
    public function getResponseObject();

    /**
     * Decode json
     *
     * @return array|object
     */
    public function getResponseJson(bool $formatAssoc = false);

    /**
     * Return response state
     */
    public function getState():string;

    /**
     * Error message setter
     */
    public function setErrorMessage(string $message):void;

    /**
     * Error message getter
     */
    public function getErrorMessage():string;

    /**
     * Returns error message during parsing
     *
     * @return mixed
     */
    public function getParsingErrorMessage():string;

    public function setIsTimeOuted():void;

    public function isTimeOuted():bool;
}
