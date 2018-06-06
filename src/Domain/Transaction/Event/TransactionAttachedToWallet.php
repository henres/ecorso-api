<?php

namespace Ecorso\Transaction\Event;

use Symfony\Component\EventDispatcher\Event;
use Ecorso\Transaction\Transaction;

class TransactionAttachedToWallet extends Event
{
    const NAME = 'transaction.attached_to_wallet';

    protected $transaction;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    public function getTransaction()
    {
        return $this->transaction;
    }
}
