<?php

namespace Ecorso\Wallet;

use Doctrine\Common\Collections\ArrayCollection;
use Ecorso\Wallet\UserWallet;

class WalletCollection extends ArrayCollection
{
    /**
     * {@inheritdoc}
     */
    public function __construct(array $wallets = [])
    {
        parent::__construct();
        if ($wallets) {
            array_walk($wallet, [$this, 'add']);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function add($wallet)
    {
        if (!$wallet instanceof UserWallet || !$wallet instanceof ExternalWallet) {
            @trigger_error(sprintf('A wallet must be of type `%s` or `%s`', UserWallet::class, ExternalWallet::class), E_USER_WARNING);

            return false;
        }

        $key = $wallet->getId()->getValue();
        if (true === $this->containsKey($key)) {
            @trigger_error(sprintf('The wallet `%s` already exists.', $key), E_USER_WARNING);

            return false;
        }

        return parent::set($key, $wallet);
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
