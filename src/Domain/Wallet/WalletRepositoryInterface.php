<?php

namespace Ecorso\Wallet;

use Doctrine\Common\Collections\ArrayCollection;
use Ecorso\Wallet\Wallet;
use Ecorso\Wallet\WalletId;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * Repository methods below.
 */
interface WalletRepositoryInterface
{
    public function find($id) : Wallet;

    public function findAll() : WalletCollection;

    public function add(Wallet $wallet) : void;

    public function remove(Wallet $wallet) : void;
}
