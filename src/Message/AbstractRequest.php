<?php

namespace Ampeco\OmnipayAsseco\Message;

use Ampeco\OmnipayAsseco\CommonParameters;

abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    use CommonParameters;

    const TEST_ENDPOINT_PRODUCTION = 'https://entegrasyon.asseco-see.com.tr/msu/api/v2';
    const PROD_ENDPOINT_PRODUCTION = 'https://merchantsafeunipay.com/msu/api/v2/';

    public function getBaseUrl()
    {
        if ($this->getTestMode()) {
            return self::TEST_ENDPOINT_PRODUCTION;
        } else {
            return self::PROD_ENDPOINT_PRODUCTION;
        }
    }

    public function getHeaders(): array
    {
        return [];
    }

    public function getHttpMethod()
    {
        return 'POST';
    }

    /**
     * @inheritdoc
     */
    public function sendData($data)
    {
        $headers = array_merge($this->getHeaders(), [
            'Content-Type' => 'application/x-www-form-urlencoded',
        ]);
        $httpResponse = $this->httpClient->request(
            $this->getHttpMethod(),
            $this->getBaseUrl(),
            $headers,
            http_build_query(array_merge([
                'MERCHANT' => $this->getMerchant(),
                'MERCHANTUSER' => $this->getMerchantUser(),
                'MERCHANTPASSWORD' => $this->getMerchantPassword(),
            ], $data)),
        );

        return $this->createResponse(
            $httpResponse->getBody()->getContents(),
            $httpResponse->getStatusCode(),
        );
    }

    protected function createResponse($data, $statusCode)
    {
        $responseClass = $this->getResponseClass();

        return $this->response = new $responseClass($this, $data, $statusCode);
    }

    protected function getResponseClass()
    {
        return Response::class;
    }
}
