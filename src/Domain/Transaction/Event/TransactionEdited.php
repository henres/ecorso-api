<?php

namespace Ecorso\Transaction\Event;

use Symfony\Component\EventDispatcher\Event;
use Ecorso\Transaction\Transaction;

class TransactionEdited extends Event
{
    const NAME = 'transaction.edited';

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
