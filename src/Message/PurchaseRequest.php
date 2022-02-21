<?php

namespace Ampeco\OmnipayAsseco\Message;

class PurchaseRequest extends AbstractRequest
{
    const SALE = 'SALE';
    const PREAUTH = 'PREAUTH';

    public function setAction($value)
    {
        $this->setParameter('action', $value);
    }

    public function getAction()
    {
        return $this->getParameter('action');
    }

    public function getData()
    {
        $this->validate('amount', 'currency', 'token', 'customerId', 'transactionId', 'action');

        return [
            'ACTION' => $this->getAction(),
            'MERCHANTPAYMENTID' => $this->getTransactionId(),
            'AMOUNT' => $this->getAmount(),
            'CUSTOMER' => $this->getCustomerId(),
            'CURRENCY' => $this->getCurrency(),
            'CARDTOKEN' => $this->getToken(),
        ];
    }
}
