<?php

namespace Ampeco\OmnipayAsseco\Message;

class CaptureRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate('amount', 'transactionId');

        $params = [
            'ACTION' => 'POSTAUTH',
            'AMOUNT' => $this->getAmount(),
            'PGTRANID' => $this->getTransactionReference(),
            'MERCHANTPAYMENTID' => $this->getTransactionId(),
        ];

        if (!$this->getTestMode()) {
            $params['DEALERTYPENAME'] = $this->getDealerTypeName();
            $params['PAYMENTSYSTEM'] = $this->getPaymentSystem();
        }

        return $params;
    }
}
