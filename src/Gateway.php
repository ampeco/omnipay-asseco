<?php

namespace Ampeco\OmnipayAsseco;

use Ampeco\OmnipayAsseco\Message\AbstractRequest;
use Ampeco\OmnipayAsseco\Message\CaptureRequest;
use Ampeco\OmnipayAsseco\Message\PurchaseRequest;
use Ampeco\OmnipayAsseco\Message\CreateCardRequest;
use Ampeco\OmnipayAsseco\Message\DeleteCardRequest;
use Ampeco\OmnipayAsseco\Message\ListPaymentMethodsRequest;
use Ampeco\OmnipayAsseco\Message\VoidRequest;
use Omnipay\Common\AbstractGateway;


/**
 * @method \Omnipay\Common\Message\NotificationInterface acceptNotification(array $options = [])
 * @method \Omnipay\Common\Message\AbstractRequest completeAuthorize(array $options = [])
 * @method \Omnipay\Common\Message\AbstractRequest completePurchase(array $options = [])
 * @method \Omnipay\Common\Message\AbstractRequest refund(array $options = [])
 * @method \Omnipay\Common\Message\AbstractRequest fetchTransaction(array $options = [])
 * @method \Omnipay\Common\Message\AbstractRequest updateCard(array $options = [])
 */
class Gateway extends AbstractGateway
{
    use CommonParameters;

    public function getName()
    {
        return 'Asseco';
    }

    public function getCreateCardAmount()
    {
        return 10;
    }

    public function getCreateCardCurrency()
    {
        return 'RSD';
    }

    public function authorize(array $options = []): AbstractRequest
    {
        return $this->createRequest(PurchaseRequest::class, array_merge($options, ['action' => 'PREAUTH']));
    }

    public function capture(array $options = []): AbstractRequest
    {
        return $this->createRequest(CaptureRequest::class,  $options);
    }

    public function void(array $options = []): AbstractRequest
    {
         return $this->createRequest(VoidRequest::class, $options);
    }

    public function purchase(array $options = []): AbstractRequest
    {
        return $this->createRequest(PurchaseRequest::class, array_merge($options, ['action' => 'SALE']));
    }

    public function createCard(array $options = []): AbstractRequest
    {
        return $this->createRequest(CreateCardRequest::class, $options);
    }

    public function deleteCard(array $options = []): AbstractRequest
    {
        return $this->createRequest(DeleteCardRequest::class, $options);
    }

     public function listPaymentMethods(array $options = []): AbstractRequest
     {
         return $this->createRequest(ListPaymentMethodsRequest::class, $options);
     }
}
