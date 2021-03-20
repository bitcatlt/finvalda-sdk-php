<?php

namespace Finvalda\Method;


use Finvalda\Http\ResponseInterface;

trait ResponseTrait
{
    /**
     * Returns xml as object
     **
     * @return \SimpleXMLElement|null
     */
    public function getFinvaldaResponseXML(ResponseInterface $response)
    {
        $result = null;
        libxml_use_internal_errors(true);
        try {
            $data = $response->getData();
            if (isset($data->Xml) && is_string($data->Xml)) {
                $data = trim($data->Xml);
            }

            $result = new \SimpleXMLElement($data);
        } catch (\Exception $e) {
            $response->setHasErrors();
            $response->setParsingErrorMessage('Bad response XMl. Response:' . $response->getData());
            libxml_clear_errors();
        }

        return $result;
    }
}
