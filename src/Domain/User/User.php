<?php

namespace Ecorso\User;

use Ecorso\User\UserId;
use Ecorso\Wallet\UserWallet;
use Ecorso\Wallet\UserWalletCollection;

final class User
{
    /**
     * @var UserId
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $email;

    /**
     * @var UserWalletCollection
     */
    private $wallets;

    public static function register(
        UserId $id,
        string $name,
        string $email
    ) {
        $user = new Self();
        $user->id = $id;
        $user->name = $name;
        $user->email = $email;
        $user->wallets = new UserWalletCollection();
        return $user;
    }

    public function addWallet(UserWallet $wallet) {
        $this->wallets->add($wallet);
    }

    public function getWallets() {
        return $this->wallets;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return UserId
     */
    public function getId(): UserId
    {
        return $this->id;
    }
}
