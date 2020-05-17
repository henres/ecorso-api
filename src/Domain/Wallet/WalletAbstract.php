<?php 

namespace Ecorso\Wallet;

abstract class WalletAbstract
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



    public function addTransaction(Transaction $transaction) {
        $this->transactions->add($transaction);
    }
}
