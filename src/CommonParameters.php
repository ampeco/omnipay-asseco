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

    public function getDealerTypeName3d()
    {
        return $this->getParameter('dealerTypeName3d');
    }

    public function setDealerTypeName3d($value)
    {
        return $this->setParameter('dealerTypeName3d', $value);
    }

    public function getPaymentSystem3D()
    {
        return $this->getParameter('paymentSystem3d');
    }

    public function setPaymentSystem3D($value)
    {
        return $this->setParameter('paymentSystem3d', $value);
    }

    public function getDealerTypeName()
    {
        return $this->getParameter('dealerTypeName');
    }

    public function setDealerTypeName($value)
    {
        return $this->setParameter('dealerTypeName', $value);
    }

    public function getPaymentSystem()
    {
        return $this->getParameter('paymentSystem');
    }

    public function setPaymentSystem($value)
    {
        return $this->setParameter('paymentSystem', $value);
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
