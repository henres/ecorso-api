<?php 

namespace Ecorso\Wallet;

use Ecorso\User\User;
use Ecorso\Wallet\WalletId;
use Ecorso\Wallet\TransactionCollection;
use Money\Money;

/**
 * WalletAbstract final class
 */
final class UserWallet implements WalletInterface
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
     * @var Money
     */
    private $balance;

    /**
     * @var TransactionCollection
     */
    private $transactions;

    /**
     * @var User
     */
    private $user;

    /**
     * @param string $name
     * @param User $user
     * @param string|null $id
     * @param Money|null $balance
     * @return UserWallet
     */
    public static function createAndAttach(
        WalletId $id,
        string $name,
        User $user,
        Money $balance = null
    ): UserWallet {
        $account = self::create($id, $name);

        if ($balance) {
            $account->balance = $balance;
        } else {
            $account->balance = Money::EUR(0);
        }

        $account->attach($user);

        return $account;
    }

    /**
     * @param \Ecorso\Wallet\WalletId $id
     * @param string $name
     * @return UserWallet
     */
    public static function create(
        WalletId $id,
        string $name
    ): UserWallet {
        $account = new Self();
        $account->id = $id;
        $account->name = $name;
        $account->transactions = new TransactionCollection();
        return $account;
    }

    public function addTransaction(Transaction $transaction) {
        $this->transactions->add($transaction);
    }

    /**
     * @param User $user
     */
    public function attach(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return WalletId
     */
    public function getId(): WalletId
    {
        return $this->id;
    }
}
