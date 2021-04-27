<?php

namespace Finvalda\Http;

interface SoapRequestInterface extends RequestInterface
{
    /**
     * Return request url
     *
     * @return array
     */
    public function getParameters();

    /**
     * Return request method: GET, POST etc.
     *
     * @return string
     */
    public function getFunction();

    /**
     * Return header
     *
     * @return \SoapHeader
     */
    public function getHeader();

    /**
     * Return header
     *
     * @return array
     */
    public function getOptions();

    /**
     * @return array
     */
    public function getClientOptions();

    /**
     * @return string
     */
    public function getWsdl();
}
