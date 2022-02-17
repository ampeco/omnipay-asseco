<?php

namespace Ampeco\OmnipayAsseco\Message;

use Ampeco\OmnipayAsseco\Models\Card;

class ListPaymentMethodsResponse extends Response
{
    const TYPE_CARD = 'card';

    private $cards;

    /**
     * @return Card[]
     */
    public function getCards()
    {
        if (!empty($this->cards)) {
            return $this->cards;
        }

        return $this->cards = array_map(fn ($card) => new Card($card), $this->data['cardList']);
    }

    public function setCards(array $cards): self
    {
        $this->cards = $cards;
        return $this;
    }
}
