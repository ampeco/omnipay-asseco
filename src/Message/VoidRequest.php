<?php

namespace Ampeco\OmnipayAsseco\Message;

class VoidRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate('transactionId');

        return [
            'ACTION' => 'VOID',
            'PGTRANID' => $this->getTransactionReference(),
            'MERCHANTPAYMENTID' => $this->getTransactionId(),
        ];
    }
}
