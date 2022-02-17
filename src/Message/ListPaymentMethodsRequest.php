<?php

namespace Ampeco\OmnipayAsseco\Message;

class ListPaymentMethodsRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate('customerId');

        return [
            'ACTION' => 'QUERYCARD',
            'CUSTOMER' => $this->getCustomerId(),
        ];
    }

    protected function getResponseClass()
    {
        return ListPaymentMethodsResponse::class;
    }
}
