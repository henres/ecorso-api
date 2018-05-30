<?php

namespace Ecorso\Wallet;

use Doctrine\Common\Collections\ArrayCollection;
use Ecorso\Wallet\UserWallet;

class UserWalletCollection extends WalletCollection
{
    /**
     * {@inheritdoc}
     */
    public function add($wallet)
    {
        if (!$wallet instanceof UserWallet) {
            @trigger_error(sprintf('A wallet must be of type `%s`.', UserWallet::class), E_USER_WARNING);

            return false;
        }

        $key = $wallet->getId()->getValue();
        if (true === $this->containsKey($key)) {
            @trigger_error(sprintf('The wallet `%s` already exists.', $key), E_USER_WARNING);

            return false;
        }

        return parent::set($key, $wallet);
    }
}
