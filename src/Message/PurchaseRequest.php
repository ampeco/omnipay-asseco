<?php

namespace Ampeco\OmnipayAsseco\Message;

class PurchaseRequest extends AbstractRequest
{
    public function setCapture($value)
    {
        $this->setParameter('capture', (bool) $value);
    }

    public function getCapture()
    {
        return $this->getParameter('capture');
    }

    public function getData()
    {
        $this->validate('amount', 'currency', 'token', 'description', 'capture');

        return [
            'initiation_type' => 'installment',
            'amount' => $this->getAmount(),
            'currency' => $this->getCurrency(),
            'payment_method' => $this->getToken(),
            'description' => $this->getDescription(),
            'capture' => $this->getCapture(),
        ];
    }
}
