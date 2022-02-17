<?php

namespace Ampeco\OmnipayAsseco;

trait CommonParameters
{
    public function getMerchant()
    {
        return $this->getParameter('merchant');
    }

    public function setMerchant($value)
    {
        return $this->setParameter('merchant', $value);
    }

    public function getMerchantUser()
    {
        return $this->getParameter('merchantUser');
    }

    public function setMerchantUser($value)
    {
        return $this->setParameter('merchantUser', $value);
    }

    public function getMerchantPassword()
    {
        return $this->getParameter('merchantPassword');
    }

    public function setMerchantPassword($value)
    {
        return $this->setParameter('merchantPassword', $value);
    }

    public function getCustomerId()
    {
        return $this->getParameter('customerId');
    }

    public function setCustomerId($value)
    {
        return $this->setParameter('customerId', $value);
    }
}
