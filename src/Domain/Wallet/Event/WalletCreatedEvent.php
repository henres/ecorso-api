<?php

namespace Ecorso\User\Event;

use Symfony\Component\EventDispatcher\Event;
use Ecorso\Wallet\Wallet;

class WalletCreatedEvent extends Event
{
    const NAME = 'wallet.created';

    protected $wallet;

    public function __construct(Wallet $wallet)
    {
        $this->wallet = $wallet;
    }

    public function getWallet()
    {
        return $this->wallet;
    }
}
