<?php

namespace Ampeco\OmnipayAsseco\Models;

class Card
{
    public string $cardType;
    public string $token;
    public string $firstSix;
    public string $lastFour;
    public int $month;
    public int $year;

    public function __construct(array $data)
    {
        $this->cardType = $data['cardbrand'];
        $this->token = $data['cardToken'];
        $this->firstSix = $data['cardBin'] ?? $this->panPieces($data['pan'] ?? '')[0] ?? '';
        $this->month = intval(explode('.', $data['cardExpiry'])[0]);
        $this->year = intval(explode('.', $data['cardExpiry'])[1]);
        $this->lastFour = $data['panLast4'] ?? $this->panPieces($data['pan'] ?? '')[1] ?? '';
    }

    private function panPieces(string $pan): array
    {
        return array_values(array_filter(explode('*', $pan)));
    }
}
