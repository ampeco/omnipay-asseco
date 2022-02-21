<?php

namespace Ampeco\OmnipayAsseco\Message;

class CaptureRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate('amount', 'transactionReference');

        return [
            'ACTION' => "POSTAUTH",
            'AMOUNT' => $this->getAmount(),
            'PGTRANID' => $this->getTransactionReference(),
        ];
    }
}
