<?php

namespace Ecorso\Wallet;

use Ecorso\User\User;
use Ecorso\Wallet\TransactionCollection;
use Money\Money;
use Ecorso\Wallet\WalletInterface;

/**
 * WalletAbstract final class
 */
final class ExternalWallet implements WalletInterface
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var TransactionCollection
     */
    private $transactions;

    public static function create(
        string $id,
        string $name
    ): WalletAbstract {
        $account = new Self();
        if ($id) {
            $account->id = $id;
        } else {
            $account->id = rand(0,99999);
        }

        $account->name = $name;
        $account->transactions = new TransactionCollection();
        return $account;
    }
}
