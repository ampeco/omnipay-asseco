<?php

namespace Ampeco\OmnipayAsseco\Models;

class Card
{
    public string $cardType;
    public string $token;
    public string $firstSix;
    public string $lastFour;
    public string $month;
    public string $year;

    public function __construct(array $data)
    {
        $this->cardType = $data['cardbrand'];
        $this->token = $data['cardToken'];
        $this->firstSix = $data['cardBin'];
        $this->month = intval(explode('.', $data['cardExpiry'])[0]);
        $this->year = intval(explode('.', $data['cardExpiry'])[1]);
        $this->lastFour = $data['panLast4'];
    }
}
