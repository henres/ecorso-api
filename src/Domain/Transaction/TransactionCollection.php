<?php

namespace Ecorso\Transaction;

use Doctrine\Common\Collections\ArrayCollection;
use Ecorso\Wallet\Transaction;

class TransactionCollection extends ArrayCollection
{
    /**
     * {@inheritdoc}
     */
    public function __construct(array $transactions = [])
    {
        parent::__construct();
        if ($transactions) {
            array_walk($transaction, [$this, 'add']);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function add($transaction)
    {
        if (!$transaction instanceof Transaction) {
            @trigger_error(sprintf('A transaction must be of type `%s`.', Transaction::class), E_USER_WARNING);

            return false;
        }

        $key = $transaction->getId()->getValue();
        if (true === $this->containsKey($key)) {
            @trigger_error(sprintf('The transaction `%s` already exists.', $key), E_USER_WARNING);

            return false;
        }

        return parent::set($key, $transaction);
    }

    /**
     * {@inheritdoc}
     *
     * @deprecated Use add() method instead
     */
    public function set($key, $value)
    {
        @trigger_error(sprintf('`%s` is deprecated, use `%s::add` instead.', __METHOD__, self::class), E_USER_DEPRECATED);

        return false;
    }
}
