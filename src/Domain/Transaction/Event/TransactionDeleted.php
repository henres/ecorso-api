<?php

namespace Ecorso\Transaction\Event;

use Symfony\Component\EventDispatcher\Event;
use Ecorso\Transaction\Transaction;

class TransactionDeleted extends Event
{
    const NAME = 'transaction.deleted';

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
