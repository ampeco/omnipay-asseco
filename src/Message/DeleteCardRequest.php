<?php

namespace Ampeco\OmnipayAsseco\Message;

class DeleteCardRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate('token');

        return [
            'ACTION' => 'EWALLETDELETECARD',
            'CARDTOKEN' => $this->getToken(),
        ];
    }
}
