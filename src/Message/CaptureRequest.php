<?php

namespace Ampeco\OmnipayAsseco\Message;

class CaptureRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate('amount');

        return [
            "amount" => $this->getAmount(),
        ];
    }
}
