<?php

namespace Ampeco\OmnipayAsseco\Message;

class CreateCardRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate('returnUrl', 'customerId', 'transactionId');

        return [
            'ACTION' => 'SESSIONTOKEN',
            'SESSIONTYPE' => 'WALLETSESSION',
            'LANGUAGE' => 'EN',
            'MERCHANTPAYMENTID' => $this->getTransactionId(),
            'CUSTOMER' => $this->getCustomerId(),
            'AMOUNT' => $this->getAmount(),
            'CURRENCY' => $this->getCurrency(),
            'RETURNURL' => $this->getReturnUrl(),
            'EXTRA' => urlencode(json_encode([
                "ForceSave" => "YES"
            ])),
        ];
    }
}
