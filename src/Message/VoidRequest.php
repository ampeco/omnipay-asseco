<?php

namespace Ampeco\OmnipayAsseco\Message;

class VoidRequest extends AbstractRequest
{

    public function getData()
    {
        $this->validate ('transactionReference');
        return [
            'ACTION' => 'VOID',
            'PGTRANID' => $this->getTransactionReference(),
        ];
    }
}
