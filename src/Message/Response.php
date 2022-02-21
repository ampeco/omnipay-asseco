<?php

namespace Ampeco\OmnipayAsseco\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;
use Omnipay\Common\Message\RequestInterface;
use Omnipay\Common\Message\ResponseInterface;

class Response extends AbstractResponse implements ResponseInterface, RedirectResponseInterface
{
    const REDIRECT_URL = 'https://entegrasyon.asseco-see.com.tr/chipcard/pay3d/';
    const SUCCESS_CODE = '00';

    protected int $statusCode;

    public function __construct(RequestInterface $request, $data, $statusCode)
    {
        $this->request = $request;
        $this->data = json_decode($data, true);
        $this->statusCode = (int) $statusCode;
    }

    public function getRequest(): AbstractRequest
    {
        return $this->request;
    }

    public function isSuccessful()
    {
        return $this->statusCode < 400 && $this->getCode() === self::SUCCESS_CODE;
    }

    public function isRedirect()
    {
        return array_key_exists('sessionToken', $this->data);
    }

    public function getRedirectUrl()
    {
        return self::REDIRECT_URL . $this->data['sessionToken'];
    }

    public function getTransactionReference()
    {
        if (array_key_exists('pgTranId', $this->data)) {
            return $this->data['pgTranId'];
        } elseif (array_key_exists('sessionToken', $this->data)) {
            return $this->data['sessionToken'];
        } else {
            return null;
        }
    }

    public function getCode()
    {
        return @$this->data['responseCode'];
    }

    public function getMessage()
    {
        if ($this->isSuccessful()) {
            return @$this->data['responseMsg'];
        } else {
            return @$this->data['errorMsg'];
        }
    }
}
