<?php

namespace Ecorso\Transaction;

use Ecorso\Wallet\WalletInterface;
use Datetime;
use Money\Money;
use Ecorso\Wallet\TransactionId;

final class Transaction
{
    /**
     * @var TransactionId
     */
    private $id;

    /**
     * @var Type
     */
    private $type;

    /**
     * @var DateTime
     */
    private $triggeredAt;

    /**
     * @var Money
     */
    private $balance;

    /**
     * @var WalletAbstract
     */
    private $account;

    /**
     * @var WalletAbstract
     */
    private $distantAccount;

    /**
     * @param TransactionId $id
     * @param string $type
     * @param Datetime $triggeredAt
     * @param Money $balance
     * @param \Ecorso\Wallet\WalletInterface $wallet
     * @param \Ecorso\Wallet\WalletInterface|null $distantWallet
     * @return Transaction
     */
    public static function create(
        TransactionId $id,
        string $type,
        DateTime $triggeredAt,
        Money $balance,
        WalletInterface $wallet,
        ?WalletInterface $distantWallet = null
    ): Transaction {
        $transaction = new Self();
        $transaction->id = $id;
        $transaction->type = $type;
        $transaction->triggeredAt = $triggeredAt;
        $transaction->balance = $balance;
        $transaction->account = $wallet;
        if ($distantWallet) {
            $transaction->distantAccount = $distantWallet;
        }

        return $transaction;
    }

    /**
     * @return TransactionId
     */
    public function getId(): TransactionId
    {
        return $this->id;
    }
}
