<?php

namespace Ampeco\OmnipayAsseco\Message;

class CreateCardRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate('returnUrl', 'customerId', 'transactionId');

        $params = [
            'ACTION' => 'SESSIONTOKEN',
            'SESSIONTYPE' => 'PAYMENTSESSION',
            'LANGUAGE' => 'EN',
            'MERCHANTPAYMENTID' => $this->getTransactionId(),
            'CUSTOMER' => $this->getCustomerId(),
            'AMOUNT' => $this->getAmount(),
            'CURRENCY' => $this->getCurrency(),
            'RETURNURL' => $this->getReturnUrl(),
            'EXTRA' => urlencode(json_encode([
                'ForceSave' => 'YES',
            ])),
        ];

        if (!$this->getTestMode()) {
            $params['DEALERTYPENAME'] = $this->getDealerTypeName3D();
            $params['PAYMENTSYSTEM'] = $this->getPaymentSystem3D();
        }

        return $params;
    }
}
